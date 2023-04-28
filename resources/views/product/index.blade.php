<x-layout>
    @vite(['resources/css/card.css'])
    <div class="container-fluid">
        <div class="row">

            @forelse ($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 p-0 m-md-2 m-lg-0 d-flex justify-content-center container">
                    <div class="card">
                        <div class="face face1 card-border-animation">
                            <div class="content">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($product->images as $key => $image)
                                            <div class="carousel-item active">
                                                <img src="{{ Storage::url($image->path) }}" class="d-block img-fluid"
                                                    style="height: 100%;" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="content text-center row justify-content-center">
                                <h5>{{ $product->title }}...</h5>
                                <p class="card-text">{{ substr($product->description, 0, 30) }}</p>
                                <div class="face2-element-container g-2">
                                    <div class="row justify-content-center">
                                        <div class="col-12 btnn m-0 d-flex justify-content-center">
                                            <a href="{{ route('product.show', $product) }}" class="card-link p-1">Vai al
                                                dettaglio</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Non ci sono prodotti</p>
            @endforelse
        </div>
    </div>
</x-layout>
{{-- <h6 class="card-title">{{ strtoupper(substr($product->title, 0, 25)) }}</h6>
                            <h6 class="text-center m-0 separation-paragraph"> <strong>Desrizione:</strong>   </h6>
                            <p class="card-text text-center p-2">{{ substr($product->description, 0, 20) }}...</p>
                            <h6 class="text-center m-0 separation-paragraph"> <strong>  Autore: </strong></h6>
                            <p class="card-text text-center p-2">
                                {{ $product->user->name }}
                            </p>    
                                <h6 class="text-center m-0 separation-paragraph"> <strong> Categoria: </strong></h6>
                                <ul class=" text-center ul-cat">
                                    @foreach ($product->categories as $category)
                                    <li class="cat-name">
                                        {{ $category->name ?? 'null' }}
                                    </li>
                                    @endforeach
                                </ul> --}}
