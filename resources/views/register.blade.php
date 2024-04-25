@extends('layouts.layout')

@section('content')
        <header>
            <style>
                #intro {
                    background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
                    height: 100vh;
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

                            <!-- Registration Form -->
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Background image -->

    @endsection
