<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

   {{-- @if ($errors -> any())
   @foreach ( $errors->all() as $error )
{{$error}}
   @endforeach

   @endif --}}
   <form action="{{route('storeProudct')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" value="{{ old('title') }}" id=""><br>
    @error('title')
        <span>{{ $message }}</span>
    @enderror
    <textarea name="desc" id="" cols="30" rows="10">{{ old('desc') }}</textarea>
    @error('desc')
        <span>{{ $message }}</span>
    @enderror

    <input type="text" name="price" value="{{ old('price') }}" id=""><br>
    @error('price')
    <span>{{ $message }}</span>
@enderror
<select name="category_id" id="">
    @foreach ( $categories as $category )
    <option value="{{$category->id}}"> {{$category->name}} </option>

    @endforeach
</select>
<input type="file" name="image"  id=""><br>
@error('price')
<span>{{ $message }}</span>
@enderror
    <button type="submit">Add</button>
</form>


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

