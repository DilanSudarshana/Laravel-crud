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

    return view('home', compact('posts')); // Use compact helper for cleaner syntax
});

Route::get('/allpost', [PostController::class, 'showAllPosts']);
Route::get('/largepost/{id}', [PostController::class, 'showPostByID'])->name('showPostByID');
Route::get('/allpost', [PostController::class, 'search'])->name('search');

//user profile
Route::get('/profile', [UserController::class, 'viewProfile'])->name('profile');


// Route::get('/largepost{id}', function (){
//     return view('largepost');
// });

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', function () {
    return view('register');
});


// Blog post routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showpost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);

Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
