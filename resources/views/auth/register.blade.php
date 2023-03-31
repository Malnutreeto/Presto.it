<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @vite (['resources/css/app.css', 'resources/css/auth.css', 'resources/js/app.js'])
    
    <form action="/register" method="POST">
    @csrf
    <div class="container split-background stocazzo mb-5">
        <img src="{{asset('titolo.png')}}" class="logo">
        <h3 class="title">REGISTRATI</h3>
        <div class="login-fields">
            <div class="main-div-field">
                <i class="bi bi-person"></i>
                <input type="text" class="field" placeholder="Nome e cognome" name="name">
            </div>
            @error('name')
                <div class="err-text">Nope</div>
            @enderror
            <div class="main-div-field">
                <i class="bi bi-person-add"></i>
                <input type="text" class="field" placeholder="Nickname" name="nickname">
            </div>
            @error('nickname')
                <div class="err-text">Nope</div>
            @enderror
            <div class="main-div-field">
                <i class="bi bi-envelope-at"></i>
                <input type="email" class="field" placeholder="Email" name="email">
            </div>
            @error('email')
                <div class="err-text">Nope</div>
            @enderror
            <div class="main-div-field" id='passwordInput'>
                <i class="bi bi-key"></i>
                <input type="password" class="field" placeholder="Password" name="password">              
            </div>
            @error('password')
                <div class="err-text">Nope</div>
            @enderror 
            <div class="main-div-field" id='passwordInput'>
                <i class="bi bi-asterisk"></i>
                <input type="password" class="field" placeholder="Conferma password" name="password_confirmation">               
            </div>
            @error('password_confirmation')
                <div class="err-text">Nope</div>
            @enderror
        </div>
        <div>
            <button class="button">REGISTRATI</button>
        </div>
    </div>
</form>
</body>
</html>