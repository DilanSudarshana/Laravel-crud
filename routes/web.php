<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = [];

    if (auth()->check()) {
        $posts = Post::where('user_id', auth()->id())->get();
    }

    return view('home', ['posts' => $posts]);  // Changed 'post' to 'posts'
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Blog post routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit/{post}', [PostController::class, 'showpost']);
Route::put('/update-post{post}', [PostController::class, 'updatePost']);
Route::post('/delete-post', [PostController::class, 'deletePost']);
