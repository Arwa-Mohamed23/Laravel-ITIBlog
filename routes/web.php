<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->get('/posts', [PostController::class,'index'])->name('posts.index');

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