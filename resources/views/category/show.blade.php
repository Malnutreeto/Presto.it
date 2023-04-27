<x-layout>
    <div class="container-fluid mt-4">
        <h1 class="text-center">PRESTO<sup >{{strToUpper($category->name)}}</sup></h1>
        <div class="row">
            <ul class="list-group">
                @foreach ($category->subCategories as $subCategory)
                    <li class="text-center">
                        <a href="" class="text-decoration-none">{{$subCategory->name}}</a>
                    </li>
                @endforeach
            </ul>
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
        </div>
    </div>
</x-layout>