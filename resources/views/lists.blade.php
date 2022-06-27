<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! These are all of your saved lists. No lists? create one by clicking on a song and then clicking "Add song to playlist"</h1>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>
    <a href="/genres">genres</a><br>
    <a href="/currentList">playing right now</a><br>

    @if ($songs)
        <a href="/currentList">unsaved playlist</a><br>
        <a href="/saveList">save playlist</a>
        <a href="/flushList">remove playlist</a>
    @endif

    @if ($songs)<!--songs moet lists worden-->
        @foreach ($songs as $song)
            <p>{{ $song }}</p>
            <form action="/forget" method="post">
                @csrf
                <input type="hidden" name="song_id" id="id" value="{{ $song }}"></input>
                <button type="submit">Remove song from playlist</button>
            </form>
        @endforeach
    @endif
    <p>{{ $duration }}</p>
    
</body>
</html>