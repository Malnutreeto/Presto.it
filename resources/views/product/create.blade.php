<x-layout>
    @vite(['resources/css/product-create.css','resources/js/product-create.js'])
    <div class="container-fluid mt-5">
          <div class="col-12">
            <livewire:create-product :mainCategories="$mainCategories" :products="$products" />
        </div>
        {{-- <div class="row justify-content-center mt-5">
            @foreach ($lastProducts as $lastProduct)
                <div class="col-lg-6 col-md-6 col-xl-3 mt-5 p-0 m-0">
                    <div class="card p-0 m-0" style="width: 18rem">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lastProduct->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $lastProduct->price }}€</h6>
                            <p class="card-text">{{ substr($lastProduct->description, 0, 30) }}...</p>
                            <a href="{{route('product.edit', $lastProduct)}}" class="card-link">Modifica il prodotto</a>
                            <a href="{{route('product.show', $lastProduct)}}" class="card-link">Dettaglio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    </div>
</x-layout>
