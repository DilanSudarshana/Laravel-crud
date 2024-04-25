@extends('layouts.layout')

@section('content')
    @auth
        <!-- Create Post Form -->
        <div class="shadow p-3 bg-body-tertiary rounded d-grid gap-2 col-6 mx-auto mt-5">
            <h4><strong>Create a new post</strong></h4>
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

        <!-- All Posts -->
        <div class="shadow p-3 bg-body-tertiary rounded col-12 mx-auto mt-5">
            <h4 class="text-center mt-3"><strong>All Posts</strong></h4>
            <div class="container">
                <!--Section: Content-->
                <section class="text-center">
                    <div class="row">
                        @php $count = 0; @endphp <!-- Initialize a counter -->
                        @foreach ($posts as $post)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <!-- Use col-lg-4 to create three columns on large screens, and col-md-6 for medium screens -->
                                <div class="card mt-2">
                                    <div class="bg-image hover-overlay ripple-surface-light" data-mdb-ripple-init=""
                                        data-mdb-ripple-color="light">
                                        <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid">
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>{{ $post->title }}</strong></h5>
                                        <p class="card-text">{{ $post->body }}</p>
                                    </div>
                                    <!-- Edit and Delete buttons -->
                                    <div class="d-flex justify-content-start p-3">
                                        <div class="me-2">
                                            <a href="/edit-post/{{ $post->id }}" class="btn btn-primary">Edit</a>
                                        </div>
                                        <div>
                                            <form action="/delete-post/{{ $post->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="delete" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Card footer -->
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
        </div>
    @else
        <header>
            <style>
                #intro {
                    background-image: url(/img/composition-colorful-paper-sheets.jpg);
                    height: 120vh;
                }

                /* Height for devices larger than 576px */
                @media (min-width: 992px) {
                    #intro {
                        margin-top: -58.59px;
                    }
                }

                .navbar .nav-link {
                    color: #fff !important;
                }
            </style>

            <!-- Background image -->
            <div id="intro" class="bg-image shadow-2-strong">
                <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
                    <div class="container">
                        <div class="row justify-content-center">

                            <!-- Login Form -->
                            <div class="col-xl-5 col-md-8">
                                <form action="/login" method="POST" class="bg-white rounded shadow-5-strong p-5">
                                    <h4 class="text-center"><strong>Log in</strong></h4>
                                    @csrf <!-- CSRF protection -->

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="logemail" placeholder="Email">
                                        <label class="form-label" for="logemail">Email address</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" name="logpassword" class="form-control" placeholder="Password">
                                        <label class="form-label" for="logpassword">Password</label>
                                    </div>

                                    <!-- Submit button -->
                                    <button class="btn btn-primary btn-block" data-mdb-ripple-init="">Sign in</button>

                                    <div class="form-outline mb-4 text-center">
                                        <a href="/register">Register Here...</a>
                                    </div>

                                </form>
                                
                            </div>

                            {{-- <!-- Registration Form -->
                            <div class="col-xl-5 col-md-8">
                                <form action="/register" method="POST" class="bg-white rounded shadow-5-strong p-5">
                                    @csrf <!-- CSRF protection -->

                                    <!-- Registration title -->
                                    <h4 class="text-center"><strong>Register</strong></h4>

                                    <!-- Name input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                        <label class="form-label" for="name">Name</label>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        <label class="form-label" for="email">Email address</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <!-- Register button -->
                                    <div class="mt-2 d-flex justify-content-center">
                                        <button class="btn btn-primary btn-block">Register</button>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Background image -->
        @endauth
    @endsection
