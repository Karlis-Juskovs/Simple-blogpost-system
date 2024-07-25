<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogPostController::class, 'home'])->name('home');
Route::get('/blog_post/{blogPost}/show', [BlogPostController::class, 'show'])->name('blog_post.show');

Route::middleware('checkOwner:blogPost')->group(function () {
    /* Blog post */
    Route::get('/blog_post/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('blog_post.edit');
    Route::patch('/blog_posts/{blogPost}', [BlogPostController::class, 'update'])->name('blog_post.update');
    Route::delete('/blog_posts/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog_post.destroy');
});

/* Comment deletion */
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->middleware('checkOwner:comment')->name('comment.destroy');

Route::middleware('auth')->group(function () {
    /* Profile */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Blog post */
    Route::get('/blog_post/create', [BlogPostController::class, 'create'])->name('blog_post.create');
    Route::post('/blog_posts', [BlogPostController::class, 'store'])->name('blog_post.store');

    /* Comment */
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
