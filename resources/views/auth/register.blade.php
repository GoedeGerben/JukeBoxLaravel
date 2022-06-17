<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>welcome to the juke box! Please registrate an account</h1>
    <a href="/home">Home Page</a><br>

    <form action="/register" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="your name" value="{{ old('name') }}"></input>

            @error('name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="your username" value="{{ old('username') }}"></input>
        
            @error('username')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="your email" value="{{ old('email') }}"></input>
        
            @error('email')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="your password" value=""></input>
        
            @error('password')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Password</label>
            <input type="password" name="password_confirmation" id="password" placeholder="confirm your password" value=""></input>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>