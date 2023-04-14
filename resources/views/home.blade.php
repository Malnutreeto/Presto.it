<x-layout>
    <div class="container-fluid mx-1 d-flex flex-column">
        <div class="row mt-2 justify-content-sm-center text-center align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 px-5">
                <h1>Welcome to presto.it</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, possimus!</p>
            </div>
            <div class="col-lg-6 md-6 sm-12 d-flex justify-content-center">
                <img src="https://picsum.photos/600/300" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-11 container-fluid searchbar">
        <form action="{{route('products.search')}}" method="GET" class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searched">
            <select class="form-select" aria-label="Default select example" name="category">
                <option selected disabled>Seleziona categoria</option>
                @foreach ($mainCategories as $mainCategory)
                    <option value="{{$mainCategory->id}}">{{strtoupper($mainCategory->name)}}</option>
                @endforeach    
            </select>
        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
        <div class="row mt-5 justify-content-center">
        @foreach ($mainCategories as $mainCategory)
            <div class="col-lg-2 col-md-4 col-sm-4 d-flex flex-column justify-content-center text-center p-0 mx-2 m-1 cat-icon">
                <i class="bi {{$mainCategory->icon}} fs-1"></i>
                <a href="{{route('category.show', $mainCategory)}}" class="cat-link">
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