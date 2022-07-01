<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! This is your beautiful playlist called {{ $list->name }}! wait.. you want to rename it..? but why? the name is so beautiful!</h1>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>
    <a href="/lists">your lists</a><br>

    <form action="/" method="post">
        @csrf
        <input type="hidden" name="song_id" id="id" value="{{ $playlist->id }}"></input>
        <button type="submit">Rename playlist</button>
    </form>

</body>
</html>