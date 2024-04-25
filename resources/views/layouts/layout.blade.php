<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
</head>

<body>


    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <h4 class="text-bold float-start"><strong>COOL BLOG POST</strong></h4>
                <div class="d-flex justify-content-end align-items-center">
                    @if (auth()->check())
                        <!-- Check if user is logged in -->
                        <form action="/logout" method="POST" class="me-2">
                            @csrf
                            <button class="btn btn-primary">Log Out</button>
                        </form>
                    @endif
                    <a href="/allpost" class="btn btn-primary">View All Posts</a>
                </div>
        </div>
    </nav>


    {{-- Delete item success message --}}
    @if (Session::has('delete_msg'))
        <div class="alert alert-success box-border d-flex justify-content-between align-items-center">
            <p class="pb-0 mb-0">{{ Session::get('delete_msg') }}</p>
            <a class="mdi mdi-close"></a>
        </div>
    @endif

    {{-- Edit item success message --}}
    @if (Session::has('edit_msg'))
        <div class="alert alert-success box-border d-flex justify-content-between align-items-center">
            <p class="pb-0 mb-0">{{ Session::get('edit_msg') }}</p>
            <a class="mdi mdi-close"></a>
        </div>
    @endif

    {{-- Login success message --}}
    @if (Session::has('login_msg'))
        <div class="alert alert-success box-border d-flex justify-content-between align-items-center">
            <p class="pb-0 mb-0">{{ Session::get('login_msg') }}</p>
            <a class="mdi mdi-close"></a>
        </div>
    @endif

    {{-- Error messages --}}
    @if ($errors->any() || Session::has('error_msg'))
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

                @if (Session::has('error_msg'))
                    <li>{{ Session::get('error_msg') }}</li>
                @endif
            </ul>
        </div>
    @endif

    @yield('content')

    <footer class="bg-body-tertiary text-center">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Images -->
            <section class="">
                <div class="row">
                    <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                        <div data-mdb-ripple-init class="bg-image hover-overlay shadow-1-strong rounded"
                            data-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/113.webp" class="w-100" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                        <div data-mdb-ripple-init class="bg-image hover-overlay shadow-1-strong rounded"
                            data-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/111.webp" class="w-100" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                        <div data-mdb-ripple-init class="bg-image hover-overlay shadow-1-strong rounded"
                            data-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/112.webp" class="w-100" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                        <div data-mdb-ripple-init class="bg-image hover-overlay shadow-1-strong rounded"
                            data-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/114.webp" class="w-100" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                        <div data-mdb-ripple-init class="bg-image hover-overlay shadow-1-strong rounded"
                            data-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/115.webp" class="w-100" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                        <div data-mdb-ripple-init class="bg-image hover-overlay shadow-1-strong rounded"
                            data-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/116.webp" class="w-100" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: Images -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 cool blog post, Inc
        </div>
        <!-- Copyright -->
    </footer>




    </footer>
</body>

</html>
