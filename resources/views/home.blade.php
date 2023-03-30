<x-layout>
    <div class="container-fluid mx-1  d-flex flex-column">
        <div class="row mt-2">
            <div class="col-lg-6 md-12 px-5">
                <h1>Welcome to presto.it</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, possimus!</p>
            </div>
            <div class="col-lg-6 md-6 sm-12 d-flex justify-content-center">
                <img src="https://picsum.photos/600/300" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        @foreach ($mainCategories as $mainCategory)
        <div class="row mt-5 justify-content-between">
            <div style="height: 170px; align-items: center; background-color: #1fba22c3;" class="col-lg-2 col-md-6 col-sm-12 d-flex flex-column justify-content-center text-center border border-success p-0 mx-2 m-1" >
                <i class="bi bi-handbag fs-1"></i>
                <a href="{{route('category.show', $mainCategory)}}">
                    <h5>
                        {{$mainCategory->name}}
                    </h5>
                </a>
            </div>
            
        @endforeach
        
            
            {{-- <div style="height: 170px; align-items: center; background-color: #1fba22c3;" class="col-lg-2 col-md-6 col-sm-12 d-flex flex-column justify-content-center border border-success p-0 mx-2 m-1">
                <i class="bi bi-scooter fs-1"></i>
                <h5>
                    MOTORI
                </h5>
            </div>
            
            <div  style="height: 170px; align-items: center; background-color: #1fba22c3;" class="col-lg-2 col-md-6 col-sm-12 d-flex flex-column justify-content-center text-center border border-success p-0 mx-2 m-1">
                <i class="bi bi-earbuds fs-1"></i>
                <h5>
                    ELETTRONICA
                </h5>
            </div>
            <div style="height: 170px; align-items: center; background-color: #1fba22c3;" class="col-lg-2 col-md-6 col-sm-12 d-flex flex-column justify-content-center text-center border border-success p-0 mx-3 m-1">
                <i class="bi bi-house-door fs-1"></i>

                <h5>
                    CASA
                </h5>
            </div> --}}
        </div>
    </div>
   <div class="container-fluid">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-3 mt-3">
                <div class="card shadow-lg" style="width: 18rem;">
                    <img src="https://picsum.photos/1920/1080" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <a href="{{route('product.show', $product)}}" class="btn btn-primary">Vai al dettaglio</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
   </div>
    
</x-layout>