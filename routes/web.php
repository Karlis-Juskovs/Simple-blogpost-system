<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogPostController::class, 'home'])->name('home');
Route::get('/blog_post/{blogPost}/show', [BlogPostController::class, 'show'])->name('blog_post.show');

Route::middleware('checkOwner:blogPost')->group(function () {
//    Route::resource('blog_post', BlogPostController::class)->except('index', 'show');

    Route::get('/blog_post/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('blog_post.edit');
    Route::patch('/blog_posts/{blogPost}', [BlogPostController::class, 'update'])->name('blog_post.update');


//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/blog_post/create', [BlogPostController::class, 'create'])->name('blog_post.create');
    Route::post('/blog_posts', [BlogPostController::class, 'store'])->name('blog_post.store');
});

//Route::middleware(['auth', 'verified'])->group(function () {
//    Route::resource('blog_post', BlogPostController::class)->except('index', 'show');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
