<div>
<x-layout>
    <form wire:submit.prevent="store">
        @csrf
    <div class="dropdown mb-3">
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
        <input wire:model="title" class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci il nome del prodotto">
        @error('title')
        {{$message}}
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input wire:model="price" class="form-control @error('price') is-invalid @enderror" placeholder="Inserisci il prezzo">
        @error('price')
        {{$message}}
        @enderror
    </div>
        <div class="mb-3">
        <label for="body" class="form-label">Descrizione</label>
        <input wire:model="body" class="form-contro"  placeholder="Inserisci la descrizione del prodotto">
        
    </div>
    </form>
    <div>
        <button type="submit">Inserisci</button>
    </div>
</x-layout>
</div>
