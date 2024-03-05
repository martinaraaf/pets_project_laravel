<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the Document</title>
</head>
<body>

    <a href="{{ url("proudcts/create") }}">Add new proudct</a>
    @foreach ($proudcts as $proudct)

    {{ $loop->iteration }} - <a href="{{ url("proudcts/show/$proudct->id") }}">{{ $proudct->title }}</a>
    <br>
    {{ $proudct->desc }}<br>
@endforeach
{{-- {{$proudcts -> links()}} --}}

<ul>
    @guest
    <li>
       <a href="{{url('register')}}">Register</a>
    <a href="{{url('login')}}">Login</a>
    </li>
    @endguest
    @auth
    <li>
    <form action="{{url('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">logout</button>
    </form>
    </li>
    @endauth
</ul>
</body>
</html>

