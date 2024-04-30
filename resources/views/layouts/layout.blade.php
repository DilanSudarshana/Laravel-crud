<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <h4 class="text-bold"><strong>COOL BLOG POST</strong></h4>
            </a>
            <div class="d-flex align-items-center">
                <a href="/allpost" class="btn btn-primary me-2">View All Posts</a>
                @if (auth()->check())
                    <!-- Check if user is logged in -->
                    <form action="/logout" method="POST" class="me-2">
                        @csrf
                        <button class="btn btn-primary">Log Out</button>
                    </form>
                    <form action="{{ route('profile') }}" method="GET">
                        @csrf
                        <button class="btn btn-primary" type="submit">View Profile</button>
                    </form>
                @endif
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

    <style>
        .image-container {
            overflow: hidden;
        }

        .image-container img {
            transition: transform 0.5s ease;
        }

        .image-container:hover img {
            transform: translateX(100%);
        }
    </style>

    <footer class="text-center bg-body-tertiary mt-1" style="background-color: rgba(0, 0, 0, 0.05);">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://web.facebook.com/" role="button" data-mdb-ripple-color="dark"><i
                        class="bi bi-facebook"></i></a>

                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://twitter.com/i/flow/login" role="button" data-mdb-ripple-color="dark"><i
                        class="bi bi-twitter"></i></a>

                <!-- Google -->
                <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://www.google.co.uk/" role="button" data-mdb-ripple-color="dark"><i
                        class="bi bi-google"></i></a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://www.youtube.com/" role="button" data-mdb-ripple-color="dark"><i
                        class="bi bi-youtube"></i></a>

                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://www.linkedin.com/" role="button" data-mdb-ripple-color="dark"><i
                        class="bi bi-linkedin"></i></a>
                <!-- Github -->
                <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://github.com/" role="button" data-mdb-ripple-color="dark"><i
                        class="bi bi-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:author Dilan Sudarshana
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</body>

</html>
