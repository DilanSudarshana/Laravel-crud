<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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

        return redirect('/');
    }
    public function showpost(Post $post)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Request $request, Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update($validatedData);

        return redirect('/');
    }


    public function deletePost(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/');
        }
        $post->delete();

        return redirect('/');
    }
}
