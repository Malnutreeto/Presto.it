<x-layout>
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
                                        <ul class="col-6 d-flex details justify-content-around m-0 p-0">
                                            @foreach ($shareComponent->getRawLinks() as $key => $component)
                                                <li class="col-4 text-center"><a href="{{ $component }}"
                                                        class="border border-0 m-0">
                                                        <i
                                                            class="bi bi-{{ $key }}  fs-4 @if ($key === 'whatsapp') text-success @else text-primary @endif"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
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
