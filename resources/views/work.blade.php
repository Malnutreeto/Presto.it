<x-layout>
    @vite(['resources/css/work.css', 'resources/js/work.js'])
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <form class="" action="/work" method="POST">
        @csrf
        <div class="container-fluid d-flex justify-content-center">
            <button type="submit" class="submit btn btn-sm btn-outline-light btn-hover ">
                Invia la richiesta
            </button>
        </div>
    </form>
    {{-- <div class="bkg-img">
        <h1 class="text-center">Lavora con noi</h1>
       
        <div class="description">
            <h4>VUOI METTERTI IN GIOCO?</h4>
            <p>Offriamo la possibilità di iniziare un percorso di crescita professionale oppiure consolidare la carriera in un ambiente dinamico, giovane e all'avanguardia.</p>
                  
        </div>
        <div class="separation"></div>  
        <div class="how-to-work">
            <h4>COME CANDIDARSI:</h4>
            <p>Clicca sul bottone qui in alto e i tuoi dati verranno automaticamente inviati ai nostri operatori. Riceverai una mail che confermerà che la tua richiesta è stata inviata correttamente</p>
        </div>
    </div> --}}
  <div class="container d-flex justify-content-center flex-wrap mt-5">
    <div class="iconbox">
        <i class="bi bi-house-gear"></i>
        <p class="d-none">Lorem ipsum dolor sit amet.</p>
    </div>
    <div class="iconbox">
        <i class="bi bi-clock"></i>
        <p class="d-none">Lorem ipsum dolor sit amet.</p>
    </div>
    <div class="iconbox">
        <i class="bi bi-emoji-laughing"></i>
        <p class="d-none">Lorem ipsum dolor sit amet.</p>
    </div>
    <div class="iconbox">
        <i class="bi bi-award-fill"></i>
        <p class="d-none">Lorem ipsum dolor sit amet.</p>
    </div>
  </div>
    
  
</x-layout>
