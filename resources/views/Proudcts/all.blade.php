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

</body>
</html>

