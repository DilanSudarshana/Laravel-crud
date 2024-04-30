@extends('layouts.layout')

@section('content')
    <div class="post-card">
        <div class="shadow p-3 bg-body-tertiary rounded col-10 mx-auto mt-5 hover-overlay">
            <div class="card bg-white text-dark" style="height: 500px;">

                <!-- Image as Background -->
                <div class="bg-image hover-overlay ripple-surface-light" data-mdb-ripple-init="" data-mdb-ripple-color="light"
                    style="background-image: url('{{ asset($post->image) }}'); height: 60%;">
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <!-- Card Content -->
                <div class="card-body">
                    <h4 class="card-title"><strong>{{ $post->title }}</strong></h4>
                    <p class="card-text">{{ $post->body }}</p>
                </div>

                <!-- Card Footer -->
                <div class="card-footer d-flex justify-content-between p-3">
                    <div>
                        <small> Posted by {{ $post->user->name }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>>

    <style>
        .post-card {
            transition: transform 0.3s ease;
        }

        .post-card:hover {
            transform: scale(1.05);
        }
    </style>
@endsection
