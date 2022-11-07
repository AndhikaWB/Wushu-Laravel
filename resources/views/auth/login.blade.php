<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title> Menu Login </title>
</head>

<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <center>
        <h1> Wushu Naga Mas </h1>
    </center>
    <center>
        <h1> Login </h1>
    </center>
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <label>Username : </label>
            <div>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <label>Password : </label>
            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit">Login</button>
        <hr>
        <p>Belum punya akun?<a href="{{ route('register') }}">Buat Akun</a></p>
        </form>
    </div>
</body>

</html>