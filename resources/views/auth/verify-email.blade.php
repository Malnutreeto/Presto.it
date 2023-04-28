<x-layout>
    @vite(['resources/css/mailreq.css'])

    <div class="container-fluid mt-5 classe-seria">
        <div class="row justify-content-center mt-0">
            <div class="col-4">
                <img src="{{asset('mailreq.jpg')}}" alt="" class="img-fluid imgg">
            </div>
        </div>
        <div class="row justify-content-center d-flex mt-0">
            <div class="col-8 d-flex justify-content-center">
                <div class="container-bar">    
                    <div class="progress2 progress-moved">
                        <div class="progress-bar2" >
                        </div>                       
                    </div> 
                </div>
            </div>
            <div class="col-8">
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success text-center">A new email verification link has been emailed to you!</div>
                @endif
                <div class="text-center mb-2">
                    <h3><strong>Ci sei quasi!</strong></h3>
                    <p>Ti abbiamo inviato una mail. Devi <strong>necessariamente</strong> confermare il tuo indirizzo per poter completare la registrazione. </br> Se non hai ricevuto la mail <strong>clicca sul bottone quì sotto per inviarla nuovamente</strong></p>
                </div>
                <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                    @csrf
                    <button type="submit" class="btn-new">Invia nuovamente l'e-mail di conferma</button>
                </form>
                <p class="mt-3 mb-0 text-center"><small>Stai riscontrando problemi con la registrazione?
                <br><a href="/register-retry">Registrati con un altro indirizzo e-mail</a></small></p>
            </div>
        </div>
    </div>
</x-layout>

