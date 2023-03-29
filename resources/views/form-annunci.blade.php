<x-layout>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Seleziona categoria
        </button>
        <ul class="dropdown-menu">
        @foreach($mainCategories as $category)
            <li class="dropdown-item"> {{$category->name}} </li>
        @endforeach
        </ul>
    </div>
        <div class="mb-3">
        <label for="product" class="form-label">Prodotto</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Inserisci il nome del prodotto">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Immagine</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Inserisci il prezzo">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Prezzo</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Inserisci il prezzo">
    </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descrizione</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    </form>
    <div>
        <button type="submit">Inserisci</button>
    </div>
</x-layout>