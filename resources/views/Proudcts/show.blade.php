<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the Document</title>
</head>
<body>

 Show proudcts - {{$proudct->title}} <br>
 category : {{$proudct->category->name}} <br>
    {{$proudct->desc}}<br>
    {{$proudct->price}}<br>
    <img src="{{asset("storage/$proudct->image")}}" width="100px">
    <a href="{{ url("proudcts/edit/$proudct->id") }}">edit</a>
    <form action="{{url("proudcts/$proudct->id")}}" method="post">
@csrf
@method('DELETE')
<button type="submit">delete</button>
    </form>

</body>
</html>
