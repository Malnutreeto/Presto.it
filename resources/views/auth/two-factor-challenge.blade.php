<h1>Inserisci il codice per entrare</h1>
<form class="text-center" method="POST" action="{{route('two-factor.login')}}">
    @csrf
    <div class="mb-3">
        <input name="code" type="text" placeholder="2fa" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
    </div>
    @if($errors->has('code'))
        {{$errors->first('code')}}
    @endif
    <div class="mb-3">
        <input name="recovery_code" type="text" placeholder="recovery_code" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
    </div>
    @if($errors->has('recovery_code'))
        {{$errors->first('recovery_code')}}
    @endif
    <div class="col-12">
        <button type="submit" class="btn btn-primary m-2">Submit</button>
    </div>
</form>    
