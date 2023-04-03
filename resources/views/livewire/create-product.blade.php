<div>
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="containe-fluid">
        <h1 class="text-center">Ciao {{auth()->user()->name}}, inserisci un nuovo annuncio</h1>
    </div>
    <div class="container-fluid border border-secondary rounded" style="height: 50vh; width: 80%">
        <div class="row">
            <div class="col-6 border border-secondary ms-4 mt-4 rounded m-0 p-0 overflow-hidden" style="height: 40vh; widht; 100%">
                <img src="https://picsum.photos/1920/1100" alt="" class="img-fluid w-100 m-0 p-0">
            </div>
            <form wire:submit.prevent="store" class="col-6 row justify-content-center">
                @csrf
                <h1>
                    <div class="input-group input-group-lg mt-4">
                        <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Inserisci il titolo">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                </h1>
                <div class="container-fluid d-flex align-items-end">
                    <div class="row justify-content-between">
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <input  wire:model="price" class="form-control @error('price') is-invalid @enderror" type="numeric"aria-label="Dollar amount (with dot and two decimal places)" placeholder="Prezzo">
                                @error('price')
                                    {{ $message }}
                                @enderror
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                        <div class="col-9">
                            <select wire:model.defer="category" class="form-select" aria-label="Default select example">
                                <option selected disabled>Seleziona categoria</option>
                                @foreach ($mainCategories as $maincategory)
                                    <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 row justify-content-center">
                            <div class="form-floating">
                                <textarea wire:model="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="text-center">Inserisci la descizione</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-25 mt-4">Inserisci</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>