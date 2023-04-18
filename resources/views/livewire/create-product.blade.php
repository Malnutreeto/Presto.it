<div class="container d-flex justify-content-center">
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="container-fluid">
        <h1 class="text-center">Ciao {{auth()->user()->name}}, inserisci un nuovo annuncio</h1>
    </div>
    
    
    <div class="container d-flex justify-content-center border border black rounded">
        <div class="row d-flex justify-content-start">
            <form  wire:submit.prevent="store" >
                <div class="col-10 border border black rounded w-75 h-25 m-1">
                    inserisci immagine
                </div>
                <div class="col-12 border border black rounded m-1">
                    <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Inserisci il titolo">
                    @error('title')
                    {{ $message }}
                    <div class="container-fluid align-items-center">
                        <div class="row justify-content-center">        
                            @enderror
                        </div>
                        <div class="col-8 d-flex justify-content-center border border black rounded m-1">
                            <input  wire:model="price" class="form-control @error('price') is-invalid @enderror" type="numeric"aria-label="Dollar amount (with dot and two decimal places)" placeholder="Prezzo">
                            @error('price')
                            {{ $message }}
                            @enderror
                            <span class="input-group-text">€</span>
                        </div>
                        <div class="col-12 m-1">
                            <select wire:model.defer="category" class="form-select" aria-label="Default select example">
                                <option selected disabled>Seleziona categoria</option>
                                @foreach ($mainCategories as $maincategory)
                                <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 m-3 border border-black">
                            <textarea wire:model="description" class="form-control" placeholder="Inserisci descrizione" id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                        <div class="col-12 m-3 border border-black">
                            <input wire:model="temporary_images" class="form-control @error('temporary_images.*') is-invalid @enderror" type="file" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Inserisci il titolo" name="images" multiple placeholder="Img">
                            @error('temporary_images.*')
                                <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        @if(!empty($images))
                            <div class="row">
                                <div class="col-12">
                                    <p>Photo preview:</p>
                                    <div class="row border border-4 border-info rounded shadow py-4">
                                        @foreach ($images as $key => $image)
                                            <div class="col my-3">
                                                <img src="{{$image->temporaryUrl()}}" alt="" class="img-fluid">
                                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                                            </div>                                            
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary m-2">Inserisci</button>
                        </div>
                    </form>  
                </div>
            </div>
            {{-- <div class="row justify-content-around border border-secondary rounded mx-5 mt-4 ">
                <div class="col-lg-6 col-md-10 col-sm-12 justify-content-around d-flex flex-lg-row flex-md-row justify-content-lg-center m-0 flex-sm-column align-items-sm-center">                                
                    <div class="col-lg-12 col-md-6 m-2 border border-black rounded h-50 w-50">                      
                    </div>                    
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
                </div>
            </div>  --}}
            
            
        </div>