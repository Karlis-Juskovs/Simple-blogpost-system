<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    public function home(Request $request): View
    {
        $queryBuilder = BlogPost::query();

        if ($search = $request->input('search')) {
            $queryBuilder = $queryBuilder->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
        }

        return view('home', [
            'blogPosts' => $queryBuilder->orderBy('created_at', 'desc')
                ->paginate(20),
            'search' => $search
        ]);
    }

    public function create(): View
    {
        return view('blog_post.create', [
            'categories' => Category::orderBy('name', 'asc')->get(),
        ]);
    }

    public function store(BlogPostRequest $request): RedirectResponse
    {
        return redirect()->route('blog_post.edit', [
            'blogPost' => BlogPost::create($request->validated())
        ]);
    }

    public function show(BlogPost $blogPost): View
    {
        return view('blog_post.show', [
            'blogPost' => $blogPost,
        ]);
    }

    public function edit(BlogPost $blogPost): View
    {
        return view('blog_post.edit', [
            'blogPost' => $blogPost,
            'categories' => Category::orderBy('name', 'asc')->get(),
            'assignCategories' => $blogPost->categories()->pluck('categories.id')->toArray(),
        ]);
    }

    public function update(BlogPostRequest $request, BlogPost $blogPost): RedirectResponse
    {
        $blogPost->update($request->validated());

        return redirect()->route('blog_post.edit', [
            'blogPost' => $blogPost
        ]);
    }

    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        $blogPost->delete();
        return redirect()->route('home');
    }
}
