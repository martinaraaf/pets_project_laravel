<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        body {
            padding: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <form action="{{ url('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


<div class="container">
    <h2 class="mt-3">Show Category - {{ $category->name }}</h2>
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ $category->desc }}</p>
            @if(auth()->check() && auth()->user()->role == 'admin')
            <a href="{{ url("categories/edit/$category->id") }}" class="btn btn-primary mr-2">Edit</a>
            @endif
            <form action="{{ url("categories/$category->id") }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                @if(auth()->check() && auth()->user()->role == 'admin')

                <button type="submit" class="btn btn-danger">Delete</button>
                @endif
            </form>
            <a href="{{ url("categories") }}" class="btn btn-primary">all categories</a>

        </div>
    </div>

</div>

</body>
</html>

