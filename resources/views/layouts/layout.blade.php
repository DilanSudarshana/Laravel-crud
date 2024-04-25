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
            <h3 class="text-primary float-start">COOL BLOG POST</h3>
            
            <div class="d-flex justify-content-end align-items-center">
                @if(auth()->check()) <!-- Check if user is logged in -->
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
    <div class="d-flex flex-column min-vh-100">
        <main class="flex-grow-1">
            <!-- Your main content here -->
        </main>

        <footer class="border-top text-center mt-auto">
            <p class="text-body-secondary">© 2024 cool blog post, Inc</p>
        </footer>
    </div>


    </footer>
</body>

</html>
