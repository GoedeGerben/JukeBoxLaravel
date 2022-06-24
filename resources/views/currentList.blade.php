<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! This is what is currently playing.</h1>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>
    <a href="/lists">your lists</a>

    @if ($songs)
        @foreach ($songs as $song)
            <p>{{ $song }}</p>
            <form action="/forget" method="post">
                @csrf
                <input type="hidden" name="song_id" id="id" value="{{ $song }}"></input>
                <button type="submit">Remove song from playlist</button>
            </form>
        @endforeach
    @endif
</body>
</html>