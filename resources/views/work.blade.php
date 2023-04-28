<x-layout>
    @vite(['resources/css/work.css', 'resources/js/work.js'])
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-12 left-column">
                <h1 class="text-center">{{ __('ui.question') }}</h1>
                <h4 class="text-center">{{ __('ui.slogan') }}</h4>
                <p class="text-center">{{ __('ui.text') }}</p>
                <form class="" action="/work" method="POST" id="demo-form">
                    @csrf
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 d-flex justify-content-center mt-3 mb-3">
                                <button type="submit" class="submit send-request g-recaptcha buttone" data-sitekey="6LcapoUlAAAAAG-tA3chcxsm0JfhXGk4ioDMTkVi" data-callback="onSubmit">
                                {{ __('ui.send_request') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <img src="https://images-ext-1.discordapp.net/external/eBWEvh-4zoUsuNqyzGakUMzFZ6vefBJyOeTrSte_WLI/https/cdn.templates.unlayer.com/assets/1639409113540-2.jpeg?width=907&height=662" alt="" class="img-fluid">
            </div>
        </div>
    </div>

    
    
    
    
    
</x-layout>
