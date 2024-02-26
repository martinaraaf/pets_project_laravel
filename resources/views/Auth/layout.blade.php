<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@yield('style')
    <title>@yield('title')</title>
</head>
<body>
<ul>
    <li>
       <a href="{{url('Register')}}">Register</a>
    <a href="{{url('login')}}">Login</a>

    <form action="{{url('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">logout</button>
    </form>
    </li>
</ul>
    {{-- @guest

    <a href="{{url('Register')}}">Register</a>
    <a href="{{url('login')}}">Login</a>
    @endguest --}}

    {{-- @auth

    <form action="{{url('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">logout</button>
    </form>
    @endauth --}}
    @yield('content')

    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>
