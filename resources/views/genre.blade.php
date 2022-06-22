<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! These are all of the songs for this genre.</h1>
    <h2>Current genre: {{ $genre->name }}</h2>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>
    <a href="/lists">your lists</a><br>
    <a href="/currentList">playing right now</a>

    @if ($songs->count())
        @foreach ($songs as $song)
                <div>
                    <a href="../song/{{ $song->name }}">{{ $song->name }}</a>
                </div>
        @endforeach

        @else
    @endif
</body>
</html>