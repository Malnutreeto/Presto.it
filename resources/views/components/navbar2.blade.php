@vite(['resources/js/navbar2.js', 'resources/css/navbar2.css'])

<div class="container-fluid justify-content-end my-2">
    <div class="row">
        <div class="col-10">

        </div>
        <div class="col-1 coluno">
            <div class="btn-group dropstart">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fi fi-it"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><x-_locale lang="en" nation="gb" /></li>
                    <li><x-_locale lang="it" nation="it" /></li>
                </ul>
            </div>
        </div>
        <div class="col-1 colunouno">
            @auth
            <a href="">{{auth()->user()->nickname}}</a>
            @else
            <a href=""><i class="bi bi-person-circle"></i>{{__('ui.area')}}</a>
            @endauth
        </div>
    </div>
</div>

<div class="headerz">
<canvas id="canvas1" width="1536" height="600"></canvas>
<div id="scritte-logo" class="scritte-logo d-flex justify-content-center">
    <p id="compra" class="compra" >{{__('ui.compra')}}.</p>
    <p id="vendi" class="vendi">{{__('ui.vendi')}}.</p>
    <p id="presto" class="presto ms-4 text-light">Presto.it</p>
</div>
</div>

