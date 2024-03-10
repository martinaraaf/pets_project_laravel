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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 400px;
        }

        .img-container {
            text-align: center;
        }
    </style>
</head>

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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 900px;
            margin-top: 150px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border: none;
            margin-bottom: 30px;
        }

        .img-container {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-body">
            <div class="img-container">
                <img src="{{ asset("storage/$proudct->image") }}" width="300px" alt="Product Image">
            </div>
            <h2 class="card-title" style="font-size: 1.5vw; color:red;text-align:center">  {{ $proudct->title }}</h2>
            <p class="card-text" style="color: blue;">Category: {{ $proudct->category->name }}</p>
            <p class="card-text">{{ $proudct->desc }}</p>
            <p class="card-text" style="color: red; font-weight:bold;">Price: {{ $proudct->price }}</p>
            <p class="card-text " style="color: blue;">stock_number: {{ $proudct->stock_number }}</p>
            <p class="card-text" >ingredients: {{ $proudct->ingredients }}</p>
            <p class="card-text" style="color: blue;">weight: {{ $proudct->weight }}</p>


            @if(auth()->check() && auth()->user()->role == 'admin')

           <div class="btns" style="  display: flex;
           justify-content: center;">
            <a href="{{ url("proudcts/edit/$proudct->id") }}" class="btn btn-primary">Edit</a> &nbsp;&nbsp;
            @endif
            <form action="{{ url("proudcts/delete/$proudct->id") }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                @if(auth()->check() && auth()->user()->role == 'admin')
                <button type="submit" class="btn btn-danger">Delete</button>&nbsp;&nbsp;
                @endif
            </form>
            <a href="{{ url("proudcts/all") }}" class="btn btn-primary">all proudcts</a>&nbsp;&nbsp;

           </div>
        </div>
    </div>

</body>



</html>
