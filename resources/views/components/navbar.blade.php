@vite('resources/css/navbar.css')
<div class="container-fluid m-0 p-0">
  <nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="/">
        <img src="{{ asset('titolo.png') }}" alt="" width="150" height="40">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-light dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Utente
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/login">Login</a></li>
              <li>
                @auth
                <li><hr class="dropdown-divider"></li>
                <form class="dropdown-item" action="/logout" method="POST">
                  @csrf
                  <button type="submit">
                    Logout
                  </button>
                </form>
                @endauth
              </li>
            </ul>
          </li>
          <li class="d-flex align-items-center justify-content-center button-end">
            @if(auth()->user() && auth()->user()->email_verified_at)
              <button class="btn btn-sm btn-outline-light btn-hover">
                <strong><a href="{{route('product.create')}}" class="text-decoration-none text-light ">Inserisci annuncio</a></strong>
              </button>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
