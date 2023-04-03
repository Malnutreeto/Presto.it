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
        <div class="row mt-5 justify-content-center">
        @foreach ($mainCategories as $mainCategory)
            <div class="col-lg-2 col-md-4 col-sm-12 d-flex flex-column justify-content-center text-center p-0 mx-2 m-1 porco">
                <i class="bi {{$mainCategory->icon}} fs-1"></i>
                <a href="{{route('category.show', $mainCategory)}}" class="madonna">
                    <h5 class="madonna text-center">
                        {{strtoupper($mainCategory->name)}}
                    </h5>
                </a>
            </div>
            
        @endforeach

        @foreach($mainCategories as $category)
            
        @endforeach
        

        </div>
    </div>
   <div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="col-lg-2 col-md-4 col-sm-12 mt-3 mx-auto px-0 d-flex justify-content-center">
                <div class="card shadow-lg">
                    <img src="https://picsum.photos/1920/1080" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{strtoupper($product->title)}}</h5>
                    <p class="card-text">{{$product->description}}</p>
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