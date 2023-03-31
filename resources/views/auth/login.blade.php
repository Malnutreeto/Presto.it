<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it - Login</title>
    @vite(['resources/css/app.css', 'resources/css/auth.css', 'resources/js/auth.js'])
</head>
<body>
   
<form action="/login" method="POST" id="loginForm">
    @csrf
    <div class="container split-background">
        <img src="{{asset('titolo.png')}}" class="logo">
        <h3 class="title">LOGIN</h3>
        <div class="login-fields">
            <div class="main-div-field">
                <i class="bi bi-envelope-at"></i>
                <input type="email" class="field" placeholder="Email" name="email">
            </div>
            @error('email')
                <div class="err-text">{{$message}}</div>
            @enderror
            <div class="main-div-field" id='passwordInput'>
                <i class="bi bi-key"></i>
                <input type="password" class="field" placeholder="Password" name="password">               
            </div>
        </div>
        <div class="div-icon-social">
        <a href="{{route('auth.socialite.redirect', 'google')}}" class="me-2 text-decoratione-none text-light"><i class="bi bi-google white-icon"></i></a>
        <a href="{{route('auth.socialite.redirect', 'facebook')}}" class="text-decoratione-none text-light"><i class="bi bi-facebook white-icon"></i></a>
        </div>
        <div>
            <button class="button">ACCEDI</button>
        </div>
    </div>
</form>
</body>
</html>

