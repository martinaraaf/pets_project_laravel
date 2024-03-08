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
            width: 400px;
        }

        .img-container {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Show product - {{ $proudct->title }}</h2>
            <p class="card-text">Category: {{ $proudct->category->name }}</p>
            <p class="card-text">{{ $proudct->desc }}</p>
            <p class="card-text">Price: {{ $proudct->price }}</p>
            <div class="img-container">
                <img src="{{ asset("storage/$proudct->image") }}" width="100px" alt="Product Image">
            </div>
            @if(auth()->check() && auth()->user()->role == 'admin')

            <a href="{{ url("proudcts/edit/$proudct->id") }}" class="btn btn-primary">Edit</a>
            @endif
            <form action="{{ url("proudcts/delete/$proudct->id") }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                @if(auth()->check() && auth()->user()->role == 'admin')
                <button type="submit" class="btn btn-danger">Delete</button>
                @endif
            </form>
            <a href="{{ url("proudcts/all") }}" class="btn btn-primary">all proudcts</a>

        </div>
    </div>

</body>



</html>
