<x-layout>
    @vite('resources/css/searchbar.css')
    <div class="container-fluid d-flex flex-column">
        <div class="row mt-2 justify-content-sm-center text-center align-items-center">
            <div class="col-lg-12 col-md-12 col-sm-12 px-5 flex-column">
                <h1>Welcome to presto.it</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, possimus!</p>
            </div>
            <div class="col-lg-12 md-6 sm-12 d-flex justify-content-center">
                <img src="https://picsum.photos/600/300" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <div class="search-container d-flex justify-content-center">
            <div class="searchbar">
                <form action="{{route('products.search')}}" method="GET" class="form" role="search">
                    <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search" name="searched">
                    <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle cat-select-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Seleziona categoria
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($mainCategories as $mainCategory)
                            <li class="dropdown-item container-fluid">{{strtoupper($mainCategory->name)}}</li>
                        @endforeach
                    </ul>
                </div>
                <button class="btn search-btn" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
        
        <div class="row mt-5 justify-content-center">
        @foreach ($mainCategories as $mainCategory)
            <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column justify-content-center text-center p-0 mx-2 m-1 porco">
                <i class="bi {{$mainCategory->icon}} fs-1"></i>
                <a href="{{route('category.show', $mainCategory)}}" class="madonna">
                    <h5 class="madonna text-center">
                        {{strtoupper($mainCategory->name)}}
                    </h5>
                </a>
            </div>  
        @endforeach
        </div>
    </div>
   <div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-3 mx-auto px-0 d-flex justify-content-center">
                <div class="card shadow-lg">
                    <img src="https://picsum.photos/1920/1080" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{strtoupper($product->title)}}</h5>
                    <p class="card-text">{{substr($product->description, 0, 30)}}</p>
                    <div class="container-fluid">
                        <ul class="row">
                            <li class="col-12 text-center"><i class="bi bi-share-fill"></i></li>
                            @foreach ($shareComponent->getRawLinks() as $key => $component)
                                <li class="col-4 text-center"><a href="{{$component}}"><i class="bi bi-{{$key}} fs-4 @if($key === 'whatsapp') text-success @endif"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="btnn">
                        <a href="{{route('product.show', $product)}}" class="card-link">Vai al dettaglio</a>
                    </div> 
                </div>
                </div>
            </div>
        @endforeach
    </div>
   </div>
</x-layout>