<div>
    @if (session()->has('message')) 
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <form wire:submit.prevent="store">
        @csrf
        <div>
            <select class="form-select" aria-label="Default select example">
            <!-- <option selected>Seleziona categoria</option> -->
            <option selected disabled>Seleziona categoria</option>
            @foreach ($mainCategories as $maincategory)
                <option value="{{$maincategory->id}}">{{ $maincategory->name }}</option>
            @endforeach
            </select>
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
            <label for="description" class="form-label">Descrizione</label>
            <input wire:model="description" class="form-contro"  placeholder="Inserisci la descrizione del prodotto">
        </div>
        <div>
            <button type="submit">Inserisci</button>
        </div>
    </form>
    

</div>
