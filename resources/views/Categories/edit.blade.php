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
   <form action="{{ url("categories/$category->id") }}" method="post">
    @csrf
    @method('PUT')
   
    <input type="text" name="name" value="{{ $category->name }}" id=""><br>
    @error('name')
        <span>{{ $message }}</span>
    @enderror
    <textarea name="desc" id="" cols="30" rows="10">{{ $category->desc }}</textarea>
    @error('desc')
        <span>{{ $message }}</span>
    @enderror
    <button type="submit">Update</button>
</form>


</body>
</html>
