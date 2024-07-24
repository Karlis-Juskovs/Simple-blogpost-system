<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    public function home(Request $request): View
    {
        $queryBuilder = BlogPost::query();

        if ( $search = $request->input('search')) {
            $queryBuilder = $queryBuilder->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
        }

        return view('home', [
            'blogPosts' => $queryBuilder->orderBy('created_at', 'desc')
                ->paginate(20),
            'search' => $search
        ]);
    }

    public function show(int $blogPostId): View
    {


        dd($blogPostId);

        return view('test');
    }

    public function create(): View
    {
        return view('blog_post.create', [
            'categories' => Category::orderBy('name', 'desc')->get(),
        ]);
    }

    public function store(StoreBlogPostRequest $request)
    {
        //
    }

    public function edit(BlogPost $blogPost)
    {
        //
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost)
    {
        //
    }

    public function destroy(BlogPost $blogPost)
    {
        //
    }
}
