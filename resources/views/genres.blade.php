<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! These are all of the genres.</h1>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>
    <a href="/lists">your lists</a><br>
    <a href="/currentList">playing right now</a>

    @if ($genres->count())
        @foreach ($genres as $genre)
        <div>
            <a href="">{{ $genre->name }}</a>
        </div>
        @endforeach
    @endif
</body>
</html>