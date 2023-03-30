
<div class="container-fluid m-0 p-0">
  <nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Presto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Utente
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/login">Login</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                @auth
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
          <li>
            @auth
            <button>
              <a href="">Inserisci annuncio</a>
            </button>
            @endauth
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
</div>
