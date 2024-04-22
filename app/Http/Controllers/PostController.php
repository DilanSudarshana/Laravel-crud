<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function createpost(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $inputs['user_id'] = auth()->id();
        Post::create($inputs);

        Session::flash('success_msg', 'Post created successfully');
        return redirect('/');
    }

    public function showpost(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            Session::flash('error_msg', 'Unauthorized action');
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Request $request, Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            Session::flash('error_msg', 'Unauthorized action');
            return redirect('/');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update($validatedData);

        Session::flash('success_msg', 'Post updated successfully');
        return redirect('/');
    }

    public function deletePost(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            Session::flash('error_msg', 'Unauthorized action');
            return redirect('/');
        }

        $post->delete();
        Session::flash('delete_msg', 'Post deleted successfully');
        return redirect('/');
    }
}
