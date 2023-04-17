@vite('resources/css/navbar.css')



<header class="header">
  <div class="logo">
    <img src="{{'Bianco.png'}}" alt="" width="250" height="240">
  </div>
</header>


<div class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
      JoGeek
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
    <a href="//github.io/jo_geek" target="_blank">Github</a>
    <a href="http://stackoverflow.com/users/4084003/" target="_blank">Stackoverflow</a>
    <a href="https://in.linkedin.com/in/jonesvinothjoseph" target="_blank">LinkedIn</a>
    <a href="https://codepen.io/jo_Geek/" target="_blank">Codepen</a>
    <a href="https://jsfiddle.net/user/jo_Geek/" target="_blank">JsFiddle</a>
  </div>
</div>

{{-- <div class="container-fluid m-0 p-0">
  <nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="/">
        <img src="{{ asset('titolo.png') }}" alt="" width="150" height="40">
      </a>
      <button class="navbar-toggler navbar-dark border-lg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-dark"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 justify-content-end">
          <li class="d-flex align-items-end justify-content-end button-end">
            @if(auth()->user() && auth()->user()->email_verified_at)
              <button class="btn btn-sm btn-outline-light btn-hover">
                <strong><a href="{{route('product.create')}}" class="text-decoration-none text-light ">Inserisci annuncio</a></strong>
              </button>
            @endif
            </li>
          <li class="nav-item text-end mt-1 hover-overlay">
            <a class="nav-link text-light" href="/category">Categorie</a>
          </li>
          <li class="nav-item text-end mt-1">
            <a class="nav-link text-light" href="/category">Prodotti</a>
          </li>
          @auth
          <li class="nav-item dropdown text-end mt-1">
            <a class="nav-link text-light dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->nickname}}
            </a>
            <ul class="dropdown-menu p-0 ml-">
              <li>
                <form class="dropdown-item text-end p-0 ps-sm-0 logout-field" action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="submit btn btn-sm btn-outline-light btn-hover">
                    Logout
                  </button>
                </form>
                @else
                <li class="nav-item text-end mt-1">
                  <a class="nav-link text-light" href="/login">Login</a>
                </li>
              
                @endauth

              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div> --}}
