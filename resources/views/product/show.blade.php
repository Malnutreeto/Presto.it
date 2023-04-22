<x-layout>
    @vite('resources/css/product-show.css')
    <div class="container-fluid d-flex justify-content-center mt-5">
        <div class="container mb-4 justify-content-center">
            <div class="row w-100">
                <div class="col-12 d-flex justify-content-center">
                    <div class="user-image d-flex align-items-center justify-content-center">
                        <h4 class="text-center">{{ strtoupper(substr($product->user->nickname, 0, 1)) }}</h4>
                    </div>
                    <div class="mx-4">
                        <h4 class="text-center my-0 py-0">{{ auth()->user()->nickname }}</h4>
                        <h5 class="p-0 m-0">{{ count($products->where('user_id', $product->user->id)) }} Prodotti</h5>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    @if (count($product->images) !== 1)
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                @foreach ($product->images as $key => $image)
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $key }}"
                                        class="@if ($key === 0) active @endif" aria-current="true"
                                        aria-label="Slide {{ $key + 1 }}" style="height: 10vh; width: 10vh;">
                                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100"
                                            alt="img-fluid">
                                    </button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($product->images as $key => $image)
                                    <div class="carousel-item @if ($key === 0) active @endif">
                                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else
                        <div>
                            @foreach ( $product->images as $image)
                                <img src="{{ Storage::url($image->path) }}"
                                alt="" class="w-100 img-fluid">
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-12 d-flex flex-column align-items-center">
                  <div class="col-8 d-flex justify-content-center align-item-center my-2">
                      <h2> {{ $product->price }}</h2>
                      <div class="d-flex align-items-center ms-2"><strong>EUR</strong></div>
                  </div>
                  <div class="col-8 my-2">
                      <h1>{{ strtoupper($product->title) }}</h1>
                  </div>
                  <div class="col-8 my-2">
                      @foreach ($product->categories as $category)
                          <h6>{{ $category->name }}</h6>
                      @endforeach
                  </div>
                  <div class="col-8 border border-black my-2">
                      <p class="product-show-description">{{ $product->description }}</p>
                  </div>
                  <div class="col-8">
                      <h6>Utente verificato</h6>
                      <h6>Utente dal: {{ \Carbon\Carbon::parse($product->user->created_at)->format('d/m/y') }}</h6>
                      <h6> Ultimo aggiornamento: {{ \Carbon\Carbon::parse($product->udate_at)->format('d/m/y') }}</h6>
                  </div>
              </div>  
            </div>
        </div>
    </div>
</x-layout>
