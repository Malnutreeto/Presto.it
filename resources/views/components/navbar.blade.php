@vite(['resources/css/navbar.css', 'resources/js/navbar.js'])



<header id="logo" class="header">
  <div id="header-logo" class="logo py-4">
    <img src="{{asset('site_img/solobusta.png')}}" alt="" width="150" height="140" class="position-fixed">
    <div id="scritte-logo" class="scritte-logo d-flex justify-content-center" >
        <p id="compra" class="compra" >Compra.</p>
        <p id="vendi" class="vendi">Vendi.</p>
        <p id="presto" class="presto ms-4 text-light">Presto.it</p>
    </div>
    
  </div>
 
</header>


<div id="navbar" class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div id="nav-logo" class="nav-logo d-none">
      <a href="/"><img src="{{ asset('site_img/solobusta.png') }}" alt="" width="50" height="40"></a>
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
    {{-- <ul>
      <li>
        @if(auth()->user() && auth()->user()->email_verified_at)
              <button class="btn btn-sm btn-outline-light btn-hover">
                <strong><a href="{{route('product.create')}}" class="text-decoration-none text-light ">Inserisci annuncio</a></strong>
              </button>
            @endif
      </li>
    </ul> --}}
    <a href="{{route('product.create')}}">inserisci annuncio</a>
    <a href="{{route('category.index')}}">categorie</a>
    <a href="{{route('product.index')}}">prodotti</a>
    <a href="{{}}">utente</a>
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
<ul>
  <li>
    <x-_locale lang="it" nation="it" />
  </li>
  <li>
    <x-_locale lang="en" nation="gb" />
  </li>
</ul>