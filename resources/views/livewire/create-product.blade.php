<div>
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="container-fluid">
        <h1 class="text-center">Ciao{{auth()->user()->name}}, inserisci un nuovo annuncio</h1>
    </div>
    {{-- <div class="container-fluid border border-secondary rounded" style="height: 50vh; width: 80%"> --}}
        
        
        {{-- div box --}}
        <div class="row justify-content-around border border-secondary rounded mx-4 mt-4">
            <div class="col-lg-6 col-md-10 col-sm-12 justify-content-around d-flex flex-lg-row flex-md-row justify-content-lg-center m-0 flex-sm-column align-items-sm-center">
                
                {{-- <div class="row border border-secondary rounded mx-4 mt-4 justify-content-around align-items-center"> --}}
                    
                    {{-- div img --}}
                    <div class="col-lg-12 col-md-6 m-2 overflow-hidden">
                        <img src="https://picsum.photos/500/300" alt="" class="img-fluid m-0 p-0">
                    </div>
                    {{-- div form --}}
                    <form wire:submit.prevent="store" class="col-6 row justify-content-center text-center">
                        @csrf
                        <div class="col-lg-12 col-md-10 col-sm-12 justify-content-center d-flex flex-sm-column align-items-sm-center">
                            <div class="input-group input-group-lg m-4">
                                <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Inserisci il titolo">
                                @error('title')
                                {{ $message }}
                                <div class="container-fluid align-items-center">
                                    <div class="row justify-content-center">        
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <input  wire:model="price" class="form-control @error('price') is-invalid @enderror" type="numeric"aria-label="Dollar amount (with dot and two decimal places)" placeholder="Prezzo">
                                        @error('price')
                                        {{ $message }}
                                        @enderror
                                        <span class="input-group-text">€</span>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <select wire:model.defer="category" class="form-select" aria-label="Default select example">
                                        <option selected disabled>Seleziona categoria</option>
                                        @foreach ($mainCategories as $maincategory)
                                        <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-10 row justify-content-center">
                                    <div class="form-floating">
                                        <textarea wire:model="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2" class="text-center">Inserisci la descizione</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-25 m-2">Inserisci</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- </div> --}}
                    
                </div>
            </div>
            
            {{-- </div> --}}
        </div>