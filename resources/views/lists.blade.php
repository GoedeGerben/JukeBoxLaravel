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
        <br>
        <a href="/tempList">unsaved playlist</a>
        <p>this playlist is {{ $duration }} seconds long</p>
    @endif

    @if ($lists)
        @foreach ($lists as $list)
            <br>
            <form action="playList/{{ $list->name }}" method="post">
            @csrf
                <input type="hidden" name="list_id" value="{{ $list->id }}"></input>
                <button type="submit">{{ $list->name }}</button>
            </form>
            <p>this playlist is {{ $list->duration }} seconds long</p>
        @endforeach
    @endif
    
</body>
</html>