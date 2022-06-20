<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>welcome to the juke box! Please log into your account</h1>
    <a href="/register">Register an account</a><br>
    @if (session('status'))
        {{ session('status')}}
    @endif
    <form action="/login" method="post">
        @csrf
        
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
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">remember me</label>
            </div>
        </div>

        <div>
            <button type="submit">Log in</button>
        </div>
    </form>
</body>
</html>