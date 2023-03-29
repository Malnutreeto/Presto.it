<h1>Accedi</h1>
<form class="text-center" method="POST" action="/login">
    @csrf
    <div class="mb-3">
        <input name="email" type="email" placeholder="email" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
    </div>
    @if($errors->has('email'))
        {{$errors->first('email')}}
    @endif
    <div class="mb-3">
        <input name="password" type="password" placeholder="password" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
    </div>
    @if($errors->has('password'))
        {{$errors->first('password')}}
    @endif
    <div class="col-12">
        <button type="submit" class="btn btn-primary m-2">Submit</button>
    </div>
</form>    