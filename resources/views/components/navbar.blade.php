@vite('resources/css/navbar.css')
{{-- 
<nav class="navbar row navbar-expand-sm bg-body-tertiary">
  <div class="container-fluid col-4">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav row  mb-2 mb-lg-0">
        <li class="col-4">
          @if(auth()->user() && auth()->user()->email_verified_at)
          <a href="{{route('product.create')}}" class="text-decoration-none text-light ">
            <button class="btn btn-sm ">
              Inserisci annuncio
            </button>
          </a>
          <li class="nav-item text-end mt-1">
            <a class="nav-link text-light" href="/work">Lavora con noi</a>
          </li>
          @endif
        </li>
      </ul>
     </div>
  </div>
  <div class="col-4">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('titolo.png') }}" alt="" width="150" height="40">
    </a>
  </div>
  <div class="col-4">
    <li class="nav-item text-end mt-1">
      <a class="nav-link text-light" href="/category">Categorie</a>
    </li>
    <li class="nav-item text-end mt-1">
      <a class="nav-link text-light" href="/product">Prodotti</a>
    </li>
    @auth
    <li class="nav-item dropdown text-end mt-1">
      <a class="nav-link text-light dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{auth()->user()->nickname}}
      </a>
      <ul class="dropdown-menu p-0 dropdown-menu-end ">
        @if(auth()->user()->role_id < 4)
        <li class="">
          <a class="nav-link text-light p-0 ms-1" href="/admin">Pannello di controllo</a>
        </li>
        @endif
        <li class= "dropdown-item text-end p-0 ps-sm-0 logout-field w-100">
          
          <form  class="" action="/logout" method="POST">
            @csrf
            <button type="submit" class="submit btn btn-sm logout-button">
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
  </div>
  
  
</nav> --}}
<div class="container-fluid m-0 p-0">
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
            <a href="{{route('product.create')}}" class="text-decoration-none text-light ">
              <button class="btn btn-sm wwu-button">
                Inserisci annuncio
              </button>
            </a>
            <li class="nav-item text-end mt-1">
              <a class="nav-link text-light" href="/work">Lavora con noi</a>
            </li>
            @endif
          </li>
          
          <li class="nav-item text-end mt-1">
            <a class="nav-link text-light" href="/category">Categorie</a>
          </li>
          <li class="nav-item text-end mt-1">
            <a class="nav-link text-light" href="/product">Prodotti</a>
          </li>
          @auth
          <li class="nav-item dropdown text-end mt-1">
            <a class="nav-link text-light dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->nickname}}
            </a>
            <ul class="dropdown-menu p-0 dropdown-menu-end ">
              @if(auth()->user()->role_id < 4)
              <li class="">
                <a class="nav-link text-light p-0 ms-1" href="/admin">Pannello di controllo</a>
              </li>
              @endif
              <li class= "dropdown-item text-end p-0 ps-sm-0 logout-field w-100">
                
                <form  class="" action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="submit btn btn-sm logout-button">
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
</div> 
