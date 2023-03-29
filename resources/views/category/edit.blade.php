<h1>Categorie principali</h1>
    @if($type === 'main')
    <form class="text-center" method="POST" action="{{route('category.update', $category)}}">
        <div class="mb-3">
            <input name="name" type="text" placeholder="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
        </div>
        @foreach ($subCategories as $subCategory)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="subCategories[]" value="{{$subCategory->id}}" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                {{$subCategory->name}}
            </label>
        </div>
        @endforeach
    @else
    <form class="text-center" method="POST" action="{{route('sub_category.update', $subCategory)}}">
        <div class="mb-3">
            <input name="name" type="text" placeholder="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
        </div>
    @endif
        @csrf
        @method('PUT')
    <div class="col-12">
        <button type="submit" class="btn btn-primary m-2">Submit</button>
    </div>
</form>