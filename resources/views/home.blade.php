<x-layout>
    @vite(['resources/css/searchbar.css', 'resources/css/navbar.css'])

    <div class="headerz">
        <canvas id="canvas1" height="600"></canvas>
        <div id="scritte-logo" class="scritte-logo d-flex justify-content-center">
            <p id="compra" class="compra pressto">{{ __('ui.compra') }}.</p>
            <p id="vendi" class="vendi pressto">{{ __('ui.vendi') }}.</p>
            <p id="presto" class="presto ms-4 text-light pressto">Presto.it</p>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center mt-4">
        <h1 class="pressto">Le categorie più popolari</h1>
    </div>
    <div class="container-fluid my-4">
        <div class="row justify-content-center">
            @foreach ($mainCategories as $mainCategory)
                <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column justify-content-center text-center p-0 mx-2 m-1 category-card">
                    <i class="bi {{$mainCategory->icon}} p-2 icons-card-category"></i>
                    <a href="{{route('category.show', $mainCategory)}}" class="text-decoration-none text-light p-2">
                        <h5 class="text-center p-2">
                            {{strtoupper($mainCategory->name)}}
                        </h5>
                    </a>
                </div>  
            @endforeach
        </div>
    </div>

    <div class="container-fluid d-flex flex-column">
        <div class="search-container d-flex justify-content-center">
            <div class="searchbar">
                <form action="{{ route('products.search') }}" method="GET" class="form" role="search">
                    <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search"
                        name="searched">
                    <select class="form-select cat-select-button" aria-label="Default select example">
                        <option selected>Seleziona una categoria</option>
                        @foreach ($mainCategories as $mainCategory)
                            <option value="{{$mainCategory->id}}">{{ strtoupper($mainCategory->name) }}</option></li>
                        @endforeach
                    </select>
                    <button class="btn search-btn" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center mt-5">
        <h1 class="pressto">Gli ultimi annunci</h1>
    </div>
    <div class="container-fluid d-flex flex-column">
        <div class="row big-container justify-content-center">
            @foreach ($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 p-0 m-md-2 m-lg-0 d-flex justify-content-center container">
                    <div class="card">
                        <div class="face face1 card-border-animation">
                            <div class="content">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                      @foreach ($product->images as $key => $image)
                                        <div class="carousel-item active">
                                            <img src="{{ Storage::url($image->path) }}" class="d-block img-fluid" style="height: 100%;" alt="...">
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
                                        <ul class="col-6 d-flex details justify-content-around m-0 p-0 social-list">
                                            @foreach ($shareComponent->getRawLinks() as $key => $component)
                                                <li class="col-4 text-center "><a href="{{ $component }}" class="border border-0 m-0">
                                                    <i class="bi bi-{{ $key }}  fs-4 @if ($key === 'whatsapp') text-success @else text-primary @endif"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="col-12 btnn m-0 d-flex justify-content-center">
                                            <a href="{{ route('product.show', $product) }}" class="card-link p-1">Vai al dettaglio</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
