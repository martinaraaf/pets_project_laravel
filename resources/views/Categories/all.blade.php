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
        .category-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .category-table th,
        .category-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        .category-link {
            text-decoration: none;
            color: #333;
        }
        .category-link:hover {
            text-decoration: underline;
        }
        .category-desc {
            color: #666;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: red; font-weight:bold;font-size:1.5vw;">Pet Zone dashboard</a>
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
    <table class="category-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ url("categories/show/$category->id") }}" class="category-link">{{ $category->name }}</a></td>
                <td class="category-desc">{{ $category->desc }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display:flex">

         @if(auth()->check() && auth()->user()->role == 'admin')

      {{-- @dd(auth()->user()->role) --}}
       <a href="{{ url("categories/create") }}" class="btn btn-primary">Add new category</a>
     @endif
            <a href="{{ url("proudcts/all") }}" class="btn btn-primary ml-2">Products</a>
    </div>

</body>
</html>


