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
    <form action="/editPlayList" method="post">
        @csrf
        <input type="hidden" name="list_id" id="id" value="{{ $list->id }}"></input>
        <input type="text" name="name" id="name" placeholder="new playlist name" value="{{ old('name') }}"></input>
        <button type="submit">Rename playlist</button>
    </form>
    <form action="/removePlayList" method="post">
        @csrf
        <input type="hidden" name="list_id" id="id" value="{{ $list->id }}"></input>
        <button type="submit">Remove playlist</button>
    </form>

    @foreach ($songs as $song)
        <p>{{ $song->name }}</p>
        <p>{{ $song->length }}</p>
        <form action="/removePlayListSong" method="post">
            @csrf
            <input type="hidden" name="song_id" id="id" value="{{ $song->id }}"></input>
            <input type="hidden" name="list_id" id="id" value="{{ $list->id }}"></input>
            <button type="submit">Remove song from playlist</button>
        </form>
    @endforeach
    <p>totale playlist duur: {{ $list->duration }}</p>
</body>
</html>