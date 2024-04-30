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
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($image->isValid()) {
                $extension = $image->getClientOriginalName();
                $imageName = rand(111, 99999) . '.' . $extension;

                if (!is_dir('public/images')) {
                    mkdir('public/images', 0777, true);
                }
                $imagePath = '/images/' . $imageName;
                $image->move(public_path('images'), $imageName);
                $inputs = $request->except('image');
                $inputs['image'] = $imagePath;
                $inputs['user_id'] = auth()->id();
                Post::create($inputs);
                return redirect('/')->with('success_msg', 'Post created successfully');
            }
        }
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
    public function showAllPosts(Post $post)
    {
        $posts = Post::all();
        return view('/allpost', ['posts' => $posts]);
        echo dump($posts);
    }

    public function showPostByID($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect('/')->with('error', 'Post not found');
        }

        return view('largepost', ['post' => $post]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('title', 'LIKE', "%$query%")
            ->orWhere('body', 'LIKE', "%$query%")
            ->get();

        return view('/allpost', compact('posts', 'query'));
    }
}
