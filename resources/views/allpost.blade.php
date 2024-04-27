@extends('layouts.layout')

@section('content')
    <div class="shadow p-3 bg-body-tertiary rounded col-12 mx-auto mt-2">
        <main class="my-5">
            <div class="container">
                <!--Section: Content-->
                <section class="text-center">
                    <div class="shadow p-3 bg-body-tertiary rounded col-12 mx-auto mt-2 mb-5">
                        <form action="/allpost" method="GET" class="d-flex">
                            <input type="text" name="query" class="form-control me-2" placeholder="Search...">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>

                    <h4 class="mt-3 mb-5"><strong>Latest posts</strong></h4>

                    @php $count = 0; @endphp <!-- Initialize a counter -->
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <!-- Use col-lg-4 to create three columns on large screens, and col-md-6 for medium screens -->
                                <div class="card post-card">
                                    <div class="bg-image hover-overlay ripple-surface-light" data-mdb-ripple-init=""
                                        data-mdb-ripple-color="light" style="">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg"
                                            class="img-fluid">
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>{{ $post->title }}</strong></h5>
                                        <p class="card-text">{{ $post->body }}</p>
                                        <a href="{{ route('showPostByID', ['id' => $post->id]) }}" class="btn btn-primary"
                                            data-mdb-ripple-init="">Read</a>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between p-3">
                                        <div>
                                            <small> Posted by {{ $post->user->name }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $count++;
                                if ($count % 3 == 0) {
                                    echo '</div><div class="row">';
                                } // Close and reopen row every 3 columns
                            @endphp
                        @endforeach
                    </div>
                </section>
                <!--Section: Content-->
            </div>
        </main>
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
