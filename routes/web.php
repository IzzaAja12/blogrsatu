<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

// Halaman utama (untuk guest)
Route::get('/', function () {
    return view('welcome');
});

// Routes autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard (hanya untuk user yang login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Routes untuk posts
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Route::get('/guest', function () {
    $posts = \App\Models\Post::where('published', true)->with(['user', 'category'])->get();
    return view('guest', compact('posts'));
})->name('guest');