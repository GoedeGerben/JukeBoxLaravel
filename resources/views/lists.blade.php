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
    <a href="/currentList">playing right now</a>

    @if ($songs)
        <a href="">unsaved playlist</a>
        <a href="/flushList">remove playlist</a>
    @endif

    @if ($songs)<!--songs moet lists worden-->
        @foreach ($songs as $song)
            <p>{{ $song }}</p>
        @endforeach
    @endif
    
</body>
</html>