<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $blogPostId = $request->input('blog_post_id');
        $blogPost = BlogPost::find($blogPostId);

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'content' => $validated['content'],
            'owner_id' => auth()->id(),
            'blog_post_id' => $blogPostId
        ]);

        return redirect()->route('blog_post.show', $blogPost);
    }

    public function destroy(Comment $comment, Request $request): RedirectResponse
    {
        $comment->delete();

        $blogPost = BlogPost::find($request->input('blog_post_id'));
        return redirect()->route('blog_post.show', $blogPost);
    }
}
