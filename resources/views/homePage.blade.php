<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box!</h1>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">log out</button>
    </form>
    <a href="/genres">genres</a><br>
    <a href="/lists">your lists</a><br>
    <a href="/currentList">playing right now</a>
</body>
</html>