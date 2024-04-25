@extends('layouts.layout')

@section('content')
    
    @auth
        <div class="shadow p-3 bg-body-tertiary rounded d-grid gap-2 col-6 mx-auto mt-5">
            <h3>Create a new post</h3>
            <form action="create-post" method="POST">
                @csrf
                <div class="form-group mt-1">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="form-group mt-1">
                    <textarea class="form-control" name="body" placeholder="Description"></textarea>
                </div>
                <div class="mt-2 d-flex justify-content-center">
                    <button class="btn btn-primary ">Create a Post</button>
                </div>
            </form>
        </div>

        <div class="shadow p-3 bg-body-tertiary rounded d-grid gap-2 col-12 mx-auto mt-5">
            <h3 class="text-center mt-3">All Posts</h3>

            @foreach ($posts as $post)
                <div class="card mt-2 bg-secondary text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }} by {{ $post->user->name }}</h5>
                        <p class="card-text">{{ $post['body'] }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="/edit-post/{{ $post->id }}" class="btn btn-primary">Edit</a>
                        <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        
        <div class="shadow p-3 mt-5 mb-5 bg-body-tertiary rounded d-grid gap-2 col-6 mx-auto">
            <form action="/login" method="POST">
                @csrf
                <h1 class="text-center">Log In</h1>
                <div class="form-group mt-1">
                    <input type="text" class="form-control" name="logemail" placeholder="Email">
                </div>
                <div class="form-group mt-1">
                    <input type="password" name="logpassword" class="form-control" placeholder="Password">
                </div>
                <div class="mt-2 d-flex justify-content-center">
                    <button class="btn btn-primary ">Log In</button>
                </div>
            </form>
        </div>
        <div class="shadow p-3 mb-5 bg-body-tertiary rounded d-grid gap-2 col-6 mx-auto">
            <form action="/register" method="POST">
                @csrf
                <h1 class="text-center">Register</h1>
                <div class="form-group mt-1">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group mt-1">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group mt-1">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="mt-2 d-flex justify-content-center">
                    <button class="btn btn-primary ">Register</button>
                </div>
            </form>
        </div>
    @endauth
@endsection
