<x-layout>
    <div class="container-fluid">
        <div class="row">
            
            @forelse ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-3 mx-auto px-0 d-flex justify-content-center">
                <div class="card shadow-lg">
                    <img src="https://picsum.photos/1920/1080" class="card-img-top img-fluid" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title"> <strong> {{ strtoupper($product->title)}} </strong> </h5>
                        
                        <p class="card-text text-center">Venditore: <STRONG>{{ $product->user->nickname }}</STRONG>  </p> 
                        <ul class=" text-center ul-cat">
                            @foreach ($product->categories as $category)
                            <li class="cat-name">
                                <a href="{{route('category.show', $category)}}" style="color: #ff8400">
                                    <strong>{{  strtoupper($category->name) ?? 'null'  }}</strong>
                                </a>
                                
                            </li>
                            @endforeach
                        </ul>       
                            <div class="btnn">
                                <a href="{{ route('product.show', $product) }}" class="card-link">Vai al dettaglio</a>
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