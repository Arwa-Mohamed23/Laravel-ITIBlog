<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', [PostController::class,'index'])->name('posts.index');

// Route::post('/posts', [PostController::class,'store'])->name('posts.store');

// Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

// Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');

// Route::patch('/posts/{post}',[PostController::class,'update'])->name('posts.update');

// Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::resource('posts',PostController::class);