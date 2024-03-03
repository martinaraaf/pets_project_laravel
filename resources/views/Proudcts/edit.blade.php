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
   <form action="{{route("updateProudct",[$proudct->id])}}" method="post">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{$proudct->title}}" id=""><br>
    @error('title')
        <span>{{ $message }}</span>
    @enderror
    <input type="text" name="price" value="{{$proudct->price}}" id=""><br>
    @error('price')
        <span>{{ $message }}</span>
    @enderror
    <textarea name="desc" id="" cols="30" rows="10">{{$proudct->desc}}</textarea>
    @error('desc')
        <span>{{ $message }}</span>
    @enderror
    <select name="category_id" id="">
        <option value="{{$proudct->category_id}}">{{$proudct->category->name}}</option>
        @foreach ( $categories as $category )
        <option value="{{$category->id}}"> {{$category->name}} </option>

        @endforeach
    </select>
    {{-- <img src="{{asset("products/".$proudct->image)}}" width="100px"> --}}
    <img src="{{asset("storage/$proudct->image")}}" width="100px">

<input type="file" name="image">
    <button type="submit">Update</button>
</form>


</body>
</html>
