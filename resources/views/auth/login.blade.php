<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it - Login</title>
    @vite(['resources/css/app.css', 'resources/css/auth.css', 'resources/js/auth.js', 'resources/css/navbar.css', 'resources/js/navbar.js'])
</head>
<body>
    <div class="boddy">
    <form action="/login" method="POST" id="loginForm">
    @csrf
    <div class="container split-background">
        <img src="{{asset('site_img/solobusta.png')}}" class="logo">
        <h3 class="title">LOGIN</h3>
        <div class="login-fields">
            <div class="main-div-field" id='loginInput'>
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
            @error('password')
            <div class="err-text">{{$message}}</div>
            @enderror 
        </div>
        <div class="div-icon-social">
        <a href="{{route('auth.socialite.redirect', 'google')}}" class="me-2 text-decoratione-none text-light fs-5 p-0"><i class="bi bi-google white-icon"></i></a>
        <a href="{{route('auth.socialite.redirect', 'facebook')}}" class="text-decoratione-none text-light fs-5 p-0"><i class="bi bi-facebook white-icon"></i></a>
        </div>
        <div>
            <button class="button">{{ __('ui.accedi') }}</button>
        </div>
        <div>
            <p class="bottom-text mt-4">{{ __('ui.not_yet') }} <a href="{{route('register')}}" class="bottom-link">{{ __('ui.register') }}</a></p>
        </div>
        <div class="mb-2">
            <a href="{{route('home')}}" class="bottom-link mb-2"><i class="bi bi-arrow-left"></i> {{ __('ui.back') }}</a>
        </div>
    </div>
    </form>
</div>
</body>
</html>

