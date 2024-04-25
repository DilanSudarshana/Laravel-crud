@extends('layouts.layout')

@section('content')
<div class="shadow p-3 bg-body-tertiary rounded col-12 mx-auto mt-5">
    <h3 class="text-center mt-3">All Posts</h3>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100 bg-secondary text-white" style="height: 500px;"> 
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->body }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between p-3">
                        <div>
                            <small> Posted by {{ $post->user->name }}</small>
                        </div>
                        <div>
                            <a href="{{ route('showPostByID', ['id' => $post->id]) }}" class="btn btn-primary">View Post</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
