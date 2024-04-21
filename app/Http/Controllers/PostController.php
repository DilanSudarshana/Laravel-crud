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
}
