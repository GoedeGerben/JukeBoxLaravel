<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! This is what is currently playing. This is a temporary playlist. If you don't save the playlist it will be removed if you clear your cookies.</h1>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>
    <a href="/lists">your lists</a><br>
    <a href="/saveList">save playlist</a><br>
    <a href="/flushList">remove playlist</a>

    @foreach ($songs as $song)
        <p>{{ $song }}</p>
        @foreach ($names as $name)
            @if($name->id == $song)
                <p>{{ $name->name}}</p>
            @endif
        @endforeach
        <form action="/forget" method="post">
            @csrf
            <input type="hidden" name="song_id" id="id" value="{{ $song }}"></input>
            <button type="submit">Remove song from playlist</button>
        </form>
    @endforeach
    <p>{{ $duration }}</p>
</body>
</html>