<div class="container-fluid d-flex justify-content-center mt-5">
    <div class="container mb-4 justify-content-center">
        <div class="row w-100">
            <form  wire:submit.prevent="store" >
                <div class="col-12 d-flex justify-content-center">
                    <div class="user-image d-flex align-items-center justify-content-center">
                        <h4 class="text-center">{{ strtoupper(substr(auth()->user()->nickname, 0, 1)) }}</h4>
                    </div>
                    <div class="mx-4">
                        <h4 class="text-center my-0 py-0">{{ auth()->user()->nickname }}</h4>
                        <h5 class="p-0 m-0">{{ count($products->where('user_id', Auth()->user()->id)) }} Prodotti</h5>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="img-input d-flex align-items-center justify-content-center my-2">
                        @if (empty($images))
                            <div class="row justify-content-center">
                                <button class="loader btn"></button>
                                <h5 class="text-center">Clicca qui per caricare le immagini</h5>
                            </div>
                            <input wire:model="temporary_images" class=" d-none @error('temporary_images.*') is-invalid @enderror"
                                type="file" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                                placeholder="Inserisci il titolo" name="images" multiple placeholder="Img" required>
                            @error('temporary_images.*')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        @else
                            @if (count($images) !== 1)
                            <div id="carouselExampleIndicators" class="carousel slide">
                                <div class="carousel-indicators">
                                    @foreach ($images as $key => $image)
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}"  class="@if($image === $images[array_key_first($images)]) active @endif"  aria-current="true"  aria-label="Slide {{$key+1}}" style="height: 10vh; width: 10vh;">
                                            <img src="{{ $image->temporaryUrl() }}" class="d-block w-100" alt="img-fluid">
                                        </button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach ($images as $key => $image)
                                        <div class="carousel-item @if($image === $images[array_key_first($images)]) active @endif">
                                            <button type="button" class="btn btn-danger shadow d-block text-center mx-auto z-2 position-absolute " wire:click="removeImage({{$key}})">Cancella</button>
                                            <img src="{{ $image->temporaryUrl() }}" class="d-block w-100" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            @else
                            <div>
                                <button type="button" class="btn btn-danger shadow d-block text-center mx-auto z-2 position-absolute" wire:click="removeImage({{array_key_first($images)}})">Cancella</button>
                                <img src="{{ $images[array_key_first($images)]->temporaryUrl() }}" alt="" class="w-100 img-fluid">
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-12 d-flex flex-column align-items-center">
                    <div class="col-8 d-flex justify-content-center align-item-center my-2">
                        <input wire:model="price" class="form-control @error('price') is-invalid @enderror" type="numeric"
                            placeholder="Inserisci il prezzo" required>
                        @error('price')
                            {{ $message }}
                        @enderror
                        <div class="d-flex align-items-center ms-2"><strong>EUR</strong></div>
                    </div>
                    <div class="col-8 my-2">
                        <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                            placeholder="Inserisci il titolo" required>
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-8 my-2">
                        <select wire:model.defer="category" class="form-select" aria-label="Default select example" required>
                            <option selected disabled>Seleziona categoria</option>
                            @foreach ($mainCategories as $maincategory)
                                <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-8 border border-black my-2">
                        <textarea wire:model="description" class="form-control" placeholder="Inserisci descrizione" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary m-2">Inserisci</button>
                </div>
            </form>
        </div>
    </div>
</div>

