<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the Document</title>
</head>
<body>
    <a href="{{ url("categories/create") }}">Add new category</a>
    @foreach ($categories as $category)

    {{ $loop->iteration }} - <a href="{{ url("categories/show/$category->id") }}">{{ $category->name }}</a>
    <br>
    {{ $category->desc }}<br>
@endforeach


</body>
</html>
