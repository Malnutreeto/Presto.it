@vite(['resources/css/navbar.css', 'resources/js/navbar.js', 'resources/js/canvas.js'])
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-12 d-flex justify-content-end align-items-center">
            <div class="btn-group dropstart m-1">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fi fi-{{ app()->getLocale() === 'en' ? 'gb' : app()->getLocale() }}"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <x-_locale lang="en" nation="gb" />
                    </li>
                    <li>
                        <x-_locale lang="it" nation="it" />
                    </li>
                </ul>
            </div>
            <div class="">
                @auth
                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->nickname }}</i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <form class="dropdown-item" action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn w-100 text-light text-start p-0 m-0">
                              Logout
                            </button>
                        </form>
                    </li>
                    @if(auth()->user()->role_id < 4)
                        <li><a class="dropdown-item" href="{{route('admin')}}">Pannello di controllo</a></li>
                    @endif
                </ul>
                @else
                    <a href="/login"><i class="bi bi-person-circle"></i>{{ __('ui.area') }}</a>
                @endauth
            </div>
        </div>
    </div>
</div>

<div class="headerz">
    <canvas id="canvas1" width="1519" height="600"></canvas>
    <div id="scritte-logo" class="scritte-logo d-flex justify-content-center">
        <p id="compra" class="compra">{{ __('ui.compra') }}.</p>
        <p id="vendi" class="vendi">{{ __('ui.vendi') }}.</p>
        <p id="presto" class="presto ms-4 text-light">Presto.it</p>
    </div>
</div>
<div id="navbar" class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div id="nav-logo" class="nav-logo d-none">
            <a href="/"><img src="{{ asset('site_img/solobusta.png') }}" alt="" width="50"
                    height="40"></a>
        </div>
    </div>
    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>

    <div class="nav-links">
        <a href="{{ route('product.create') }}">inserisci annuncio</a>
        <a href="{{ route('category.index') }}">categorie</a>
        <a href="{{ route('product.index') }}">prodotti</a>
    </div>
</div>
