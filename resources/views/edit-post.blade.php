@extends('layouts.layout')
@section('content')
    <div class="shadow p-3 bg-body-tertiary rounded d-grid gap-2 col-6 mx-auto mt-5 ">
        <h3>Edit Post</h3>
        <form action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-1">
                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group mt-1">
                <textarea class="form-control" name="body">{{ $post->body }}</textarea>
            </div>
            <div class="mt-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
