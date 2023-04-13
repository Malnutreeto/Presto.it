<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it - Registrati</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
       function onSubmit(token) {
         document.getElementById("demo-form").submit();
       }
     </script>

</head>
<body>
    @vite (['resources/css/app.css', 'resources/css/auth.css', 'resources/js/auth.js'])
    <form action="/register" method="POST" id="demo-form">
    @csrf
    <div class="container split-background form-container mb-5">
        <img src="{{asset('titolo.png')}}" class="logo">
        <h3 class="title">REGISTRATI</h3>
        <div class="login-fields">
            <div class="main-div-field">
                <i class="bi bi-person"></i>
                <input type="text" class="field" placeholder="Nome e cognome" name="name">
            </div>
            @if($errors->has('name') || $errors->has('surname'))
                @foreach ($errors->all() as $error)
                    <div class="err-text">{{$error}}</div>
                @endforeach
            @enderror
            <div class="main-div-field">
                <i class="bi bi-person-add"></i>
                <input type="text" class="field" placeholder="Nickname" name="nickname">
            </div>
            @error('nickname')
                <div class="err-text">{{$message}}</div>
            @enderror
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
            @error('password')
                <div class="err-text">{{$message}}</div>
            @enderror 
            <div class="main-div-field" id='passwordInput'>
                <i class="bi bi-asterisk"></i>
                <input type="password" class="field" placeholder="Conferma password" name="password_confirmation">               
            </div>
            @error('password_confirmation')
                <div class="err-text">{{$message}}</div>
            @enderror
        </div>
        <!-- <div class="d-flex justify-content-center">
            <div class="g-recaptcha" data-sitekey="6LdTkYMlAAAAAP6EdIQdR5bG2-m0NmgiReg-cKR4" data-theme="dark">
            </div>               
        </div> -->
        <div>
            <button class="button g-recaptcha" data-sitekey="6LcapoUlAAAAAG-tA3chcxsm0JfhXGk4ioDMTkVi" data-callback="onSubmit">REGISTRATI</button>
        </div>
    </div>
</form>
</body>
</html>