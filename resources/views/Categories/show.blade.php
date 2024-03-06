<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the Document</title>
</head>
<body>

 Show Category - {{ $category->name }} <br>
    {{ $category->desc }}<br>
    <a href="{{ url("categories/edit/$category->id") }}">edit</a>
    <form action="{{url("categories/$category->id")}}" method="post">
@csrf
@method('DELETE')
<button type="submit">delete</button>
    </form>

</body>
</html>
