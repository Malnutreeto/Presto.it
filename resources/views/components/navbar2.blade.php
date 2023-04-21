@vite(['resources/js/navbar2.js', 'resources/css/navbar2.css'])

<div class="trafiletto">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="container-fluid nav-item align-items-center">
        <div class="btn-group dropstart">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fi fi-it"></i>
            </button>
            <ul class="dropdown-menu">
                <li><x-_locale lang="en" nation="gb" /></li>
                <li><x-_locale lang="it" nation="it" /></li>
            </ul>
        </div>
        </li>
        <li class="area-personale">
            <span><i class="bi bi-person-circle"></i>Area Personale</span>
          {{--area personale--}}
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>

<div class="header">
<canvas id="canvas1" width="1500" height="600"></canvas>
<div id="scritte-logo" class="scritte-logo d-flex justify-content-center">
    <p id="compra" class="compra" >{{__('ui.compra')}}.</p>
    <p id="vendi" class="vendi">{{__('ui.vendi')}}.</p>
    <p id="presto" class="presto ms-4 text-light">Presto.it</p>
</div>
</div>

