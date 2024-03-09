<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        body {
            padding: 20px;
        }
        input[type="text"],
        textarea {
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: white;
            color: #495057;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>

<form action="{{ route("updateProudct",[$proudct->id]) }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $proudct->title }}" required>
    @error('title')
        <span class="error-message">{{ $message }}</span>
    @enderror

    <input type="text" name="price" value="{{ $proudct->price }}" required>
    @error('price')
        <span class="error-message">{{ $message }}</span>
    @enderror

    <textarea name="desc" cols="30" rows="10" required>{{ $proudct->desc }}</textarea>
    @error('desc')
        <span class="error-message">{{ $message }}</span>
    @enderror

    <select name="category_id" required>
        <option value="{{ $proudct->category_id }}">{{ $proudct->category->name }}</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

   

    <img src="{{ asset("storage/$proudct->image") }}" width="100px">
    <input type="file" name="image">

    <button type="submit">Update</button>
</form>

{{-- <ul class="mt-3">
    @guest
        <li>
            <a href="{{ url('register') }}">Register</a>
            <a href="{{ url('login') }}">Login</a>
        </li>
    @endguest
    @auth
        <li>
            <form action="{{ url('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </li>
    @endauth
</ul> --}}

</body>
</html>
