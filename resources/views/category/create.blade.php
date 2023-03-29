<h1>Categorie principali</h1>
<form class="text-center" method="POST" action="{{route('category.store')}}">
    @csrf
    <div class="mb-3">
        <input name="name" type="text" placeholder="nome" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
    </div>
    @foreach ($subCategories as $subCategory)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="subCategories[]" value="{{$subCategory->id}}" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            {{$subCategory->name}}
        </label>
      </div>
    @endforeach
    <div class="mb-3">
        <input name="CategoryType" type="hidden" placeholder="email" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" value="main">
    </div>
    @if($errors->has('name'))
        {{$errors->first('name')}}
    @endif
    <div class="col-12">
        <button type="submit" class="btn btn-primary m-2">Submit</button>
    </div>
</form>
<h1>Sotto categorie</h1>
<form class="text-center" method="POST" action="{{route('category.store')}}">
    @csrf
    <div class="mb-3">
        <input name="name" type="text" placeholder="nome" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
    </div>
    <div class="mb-3">
        <input name="CategoryType" type="hidden" placeholder="nome" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" value="sub">
    </div>
    @if($errors->has('name'))
        {{$errors->first('name')}}
    @endif
    <div class="col-12">
        <button type="submit" class="btn btn-primary m-2">Submit</button>
    </div>
</form>    