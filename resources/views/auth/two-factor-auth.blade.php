@if (!auth()->user()->two_factor_secret)
<form class="text-center" method="POST" action="{{route('two-factor.enable')}}">
    @csrf
    <h4>Attiva la 2FA</h4>
    <div class="col-12">
        <button type="submit" class="btn btn-primary m-2">Submit</button>
    </div>
</form>    
@else
<form class="text-center" method="POST" action="{{route('two-factor.disable')}}">
    @csrf
    @method('DELETE')
    <h4>Disattiva la 2FA</h4>
    {!! auth()->user()->twoFactorQrCodeSvg() !!}
    <div class="col-12">
        <h4>Recovery codes</h4>
        @foreach (auth()->user()->recoveryCodes() as $code)
            <li>{{$code}}</li>
        @endforeach
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary m-2">Submit</button>
    </div>
</form>    
@endif