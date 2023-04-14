<x-layout>
    <div class="container-fluid">
        <div class="row">
            @forelse ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-3 mx-auto px-0 d-flex justify-content-center">
                <div class="card shadow-lg">
                    <img src="https://picsum.photos/1920/1080" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ strtoupper($product->title) }}</h5>
                        <p class="card-text">{{ substr($product->description, 0, 30) }}...</p>
                        <p class="card-text">
                            Autore: {{ $product->user->name }}
                        <ul>
                            Categorie:
                            @foreach ($product->categories as $category)
                                <li>
                                    {{ $category->name ?? 'null' }}
                                </li>
                            @endforeach
                        </ul>
                        </p>
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
