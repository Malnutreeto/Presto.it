@if($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
@endif

<x-layout>
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Seleziona categoria
        </button>
        <ul class="dropdown-menu">
            @foreach($mainCategories as $mainCategory)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mainCategory[]" value="{{$mainCategory->id}}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$mainCategory->name}}
                    </label>
                    {{-- <li class="dropdown-item"> {{$category->name}} </li> --}}
                </div>
            @endforeach
        </ul>
    </div>
        <div class="mb-3">
        <label for="product" class="form-label">Prodotto</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Inserisci il nome del prodotto" name="title">
    </div>
    {{-- <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Immagine</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Inserisci il prezzo" name="price">
    </div> --}}
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Prezzo</label>
        <input type="numeric" class="form-control" id="exampleFormControlInput1" placeholder="Inserisci il prezzo" name="price">
    </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descrizione</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>
    <div>
        <button type="submit">Inserisci</button>
    </div>
    </form>
</x-layout>