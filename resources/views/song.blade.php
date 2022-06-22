<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! This is an overview of the song: {{ $song->name }}</h1>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>
    <a href="/lists">your lists</a><br>
    <a href="/currentList">playing right now</a>

    <div>
        <p>naam: {{ $song->name }}</p>
        <p>duur: {{ $song->length }}</p>
        <p>artiest: {{ $song->user_id }}</p>
        <p>genre: {{ $genre->name }}</p>
        <p></p>
    </div>
</body>
</html>