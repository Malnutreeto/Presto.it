<h1>Conferma password prima di procedere</h1>
<form class="text-center" method="POST" action="{{route('password.confirm')}}">
    @csrf
    <div class="col-12">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        @error('password')
        <span class="text-danger-small">Not valid</span>
        @enderror
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary m-2">Submit</button>
    </div>
</form>    