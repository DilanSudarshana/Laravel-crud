@extends('layouts.layout')

@section('content')
    <div class="shadow p-3 bg-body-tertiary rounded col-10 mx-auto mt-5">
        <div class="card bg-secondary text-white" style="height: 400px;">
            <div class="card-body">
                <h2 class="card-title text-center">{{ $post->title }}</h2>
                <p class="card-text mt-2 text-justify">{{ $post->body }}</p>
            </div>
        </div>
    </div>
@endsection
