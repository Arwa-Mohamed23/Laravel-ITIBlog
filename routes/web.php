<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class,'index'])->name('posts.index');

Route::post('/posts', [PostController::class,'store'])->name('posts.store');

Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');

Route::patch('/posts/{post}',[PostController::class,'update'])->name('posts.update');

Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

// Route::resource('posts',PostController::class);

// Comment routes
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{post}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');