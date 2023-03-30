<x-layout>
    <div class="container-luid">
        <h1 class="text-center">{{$category->name}}</h1>
        <div class="row">
            <ul class="">
                @foreach ($category->subCategories as $subCategory)
                    <li class="text-center">
                        <a href="" class="text-decoration-none">{{$subCategory->name}}</a>
                    </li>
                @endforeach
            </ul>
            @foreach ($products as $product)
                <div class="col-3 mt-2">
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