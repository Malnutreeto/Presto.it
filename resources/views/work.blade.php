<x-layout>
    @vite(['resources/css/work.css', 'resources/js/work.js'])
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <form class="" action="/work" method="POST" id="demo-form">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-5 mb-3">
                    <button type="submit" class="submit send-request g-recaptcha" data-sitekey="6LcapoUlAAAAAG-tA3chcxsm0JfhXGk4ioDMTkVi" data-callback="onSubmit">
                        Invia la richiesta
                    </button>
                </div>
            </div>
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
    <div class="container big-content">
        <div class="row justify-content-center">
            <div class=" col-4 iconbox">
                <i class="bi bi-house-gear"></i>
                <p class="d-none text-center">Hai sempre desiderato lavorare da casa? Ora puoi!</p>
            </div>
            <div class=" col-4 iconbox">
                <i class="bi bi-clock"></i>
                <p class="d-none text-center">Lavora senza limiti di orario!</p>
            </div>
        </div>
        <div class="row justify-content-center" id="ib">
            <div class="col-4 iconbox">
                <i class="bi bi-emoji-laughing"></i>
                <p class="d-none text-center">Portaci degli amici, diventeranno tuoi colleghi!</p>
            </div>
            <div class="col-4 iconbox">
                <i class="bi bi-award"></i>
                <p class="d-none text-center">Fai carriera rapidamente!</p>
            </div>
        </div>
    </div>
    
    
    
</x-layout>
