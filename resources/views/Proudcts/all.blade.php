<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Style for the form container */
        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
.containerp{
    display: flex;
    justify-content: center;
}
.btn{
    margin-left: 480px;
    width: 150px
}
        /* Style for the input field */
        .search-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
        }

        /* Style for the button */
        .search-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Style for button hover effect */
        .search-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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


    <form class="search-form" action="{{ route('search') }}" method="GET">
        <input class="search-input" type="text" name="query" placeholder="Search for products" style="width: 800px">
        <button class="search-button" type="submit" >Search</button>
    </form>
    @if(isset($proudcts) && $proudcts->count() > 0)
    <div class="container mt-3">
        {{-- <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($proudcts as $proudct)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $proudct->title }}</td>
                    <td>{{ $proudct->desc }}</td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
    @else
    <div class="container mt-3">
        <p>No products found.</p>
    </div>
    @endif



<div class="container mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proudcts as $proudct)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ url("proudcts/show/$proudct->id") }}">{{ $proudct->title }}</a></td>
                <td>{{ $proudct->desc }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <ul class="nav">
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
    </ul> --}}
    @if(auth()->check() && auth()->user()->role == 'admin')

    <a href="{{ url("proudcts/create") }}" class="btn btn-primary mb-3">Add new product</a>
@endif
</div>

<div class="containerp">
    <div class="pagination">{{$proudcts->links()}}</div>
</div>
</body>
</html>
