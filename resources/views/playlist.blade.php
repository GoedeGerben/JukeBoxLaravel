<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! This is your beautiful playlist called {{ $list->name }}</h1>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>
    <a href="/lists">your lists</a><br>
    <a href="/">remove playlist</a>

    @foreach ($songs as $song)
        <p>{{ $song->name }}</p>
        <p>{{ $song->length }}</p>
        <form action="/" method="post">
            @csrf
            <input type="hidden" name="song_id" id="id" value="{{ $song->id }}"></input>
            <button type="submit">Remove song from playlist</button>
        </form>
    @endforeach
    <p>{{ $list->duration }}</p>
</body>
</html>