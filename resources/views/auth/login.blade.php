<x-layout>
@vite(['resources/css/auth.css', 'resources/js/auth.js'])
<form action="/login" method="POST">
    @csrf
    <div class="container split-background">
        <img src="{{asset('titolo.png')}}" class="logo">
        <h3 class="title">LOGIN</h3>
        <div class="login-fields">
            <div class="main-div-field">
                <i class="bi bi-envelope-at"></i>
                <input type="email" class="field" placeholder="Email" name="email">
                @error('email')
                    <span class="text-danger-small">Nope</span>
                @enderror
            </div>
            <div class="main-div-field">
                <i class="bi bi-key"></i>
                <input type="password" class="field" placeholder="Password" name="password">
                @error('password')
                    <span class="text-danger-small">Nope</span>
                @enderror               
            </div>
        </div>
        <div>
            <button class="button">ACCEDI</button>
        </div>
    </div>
</form>
</x-layout>