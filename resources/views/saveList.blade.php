<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
</head>
<body>
    <h1>welcome to the juke box! Save your list here!</h1>
    <a href="/logout">log out</a><br>
    <a href="/home">Home Page</a><br>

    <form action="/saveList" method="post">
        @csrf
        
        <div>
            <label for="name">Playlist name</label>
            <input type="text" name="name" id="name" placeholder="playlist name" value="{{ old('name') }}"></input>
        
            @error('name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <button type="submit">save list</button>
        </div>
    </form>


</body>
</html>