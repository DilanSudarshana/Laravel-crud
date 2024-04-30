@extends('layouts.layout')

@section('content')
    <div class="post-card">
        <div class="shadow p-3 bg-body-tertiary rounded col-10 mx-auto mt-5 hover-overlay">
            <div class="card bg-white text-dark">

                <!-- Card Content -->
                <div class="card-body">
                    <h4 class="card-title"><strong>{{ $post->title }}</strong></h4>
                    <p class="card-text">{{ $post->body }}</p>
                </div>

                <!-- Image Container -->
                <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <!-- Image with Shadow and Border Radius -->
                    <img src="{{ asset($post->image) }}" class="card-img-top with-shadow rounded" style="width: 80vh; height: 50vh;" alt="Post Image">
                </div>

                <!-- Card Footer -->
                <div class="card-footer d-flex justify-content-between p-3 mt-3">
                    <div>
                        <small> Posted by {{ $post->user->name }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .post-card {
            transition: transform 0.3s ease;
        }

        .post-card:hover {
            transform: scale(1.05);
        }
    </style>
@endsection
