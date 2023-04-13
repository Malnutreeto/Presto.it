<x-layout>
    @vite('resources/css/mailreq.css')
    <div class="container">
        <div class="container-bar">    
            <div class="progress2 progress-moved">
              <div class="progress-bar2" >
              </div>                       
            </div> 
          </div>
        <div class="row">
            <div class="col-md-5 col-sm-12 mx-auto mt-4">
                <img src="{{asset('mailreq.jpg')}}" alt="" width="350" height="300">
                
            </div>
            <div class="col-md-5 col-sm-12 mx-auto mt-4">
                <div class="card py-4">
                    <div class="card-body">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success text-center">A new email verification link has been emailed to you!</div>
                        @endif
                        <div class="text-center mb-2">
                            <h3>Verify e-mail address</h3>
                            <p>You must verify your email address to access this page.</p>
                        </div>
                        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                            @csrf
                            <button type="submit" class="btn btn-primary">Resend verification email</button>
                        </form>
                    </div>
                    <p class="mt-3 mb-0 text-center"><small>Issues with the verification process or entered the wrong email?
                        <br>Please sign up with <a href="/register-retry">another</a> email address.</small></p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

