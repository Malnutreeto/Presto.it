<x-layout>
  @vite('resources/css/product-show.css')
  <div class="container-fluid d-flex justify-content-center " style="height: 100vh">
    
    
    <div class="row w-50 h-50 border border-black rounded mt-4 flex-column justify-content-center align-items-center prod-show">
      <div class="col-4 text-center">
        <h3 class="product-show-title">{{ strtoupper($product->title) }}</h3>
        <p class="product-show-description">{{ $product->description }}</p>
      </div>
      <div class="col-6 text-center">
        <div id="carouselExampleIndicators" class="carousel slide m-0 p-0 carousel-show">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            @foreach ($product->images as $image)
            <div class="carousel-item">
              <img src="{{ Storage::url($image->path) }}" class="d-block img-fluid w-100" alt="...">
            </div>
            @endforeach
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-warning rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon rounded-circle bg-warning rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <h2> {{$product->price}}€</h2>
        <div>
          @foreach ($product->categories as $category)
          <h6>{{$category->name}}</h6>
        @endforeach
        <h5>Venditore: {{$product->user->nickname}}</h5>
        <h6>Utente verificato</h6>
        <h6>Utente dal: {{\Carbon\Carbon::parse($product->user->created_at)->format('d/m/y')}}</h6>
        <h6> Ultimo aggiornamento: {{\Carbon\Carbon::parse($product->udate_at)->format('d/m/y')}}</h6>
        </div>
      </div>
      {{-- <span class="top"></span>
     <span class="right"></span>
     <span class="bottom"></span>
    <span class="left"></span> --}}
    </div>
        
      
     
      
      
      
      
      {{-- <div class="row justify-content-center align-items-center g-2 m-2">
        <div class="col-12 bg-success mx-2">
          <div class="card mb-3" style="height: 60vh">
            <div class="row g-0 overflow-hidden">
              <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide m-0 p-0">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <span class="badge text-bg-warning position-fixed m-2"><p class="fs-4 p-0 m-1">Pending</p></span>
                      <img src="https://picsum.photos/1920/1080" class="d-block img-fluid w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <span class="badge text-bg-warning position-fixed m-2"><p class="fs-4 p-0 m-1">Pending</p></span>
                      <img src="https://picsum.photos/1920/1081" class="d-block img-fluid w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <span class="badge text-bg-warning position-fixed m-2"><p class="fs-4 p-0 m-1">Pending</p></span>
                      <img src="https://picsum.photos/1920/1082" class="d-block img-fluid w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-success rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon rounded-circle bg-success rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">
                  <h5 class="card-title">Prezzo: </h5>
                  <ul class="text-decoration-none">
                    @foreach ($product->categories as $category)
                    <li>
                      {{$category->name}}
                      <ul>
                        @foreach ($category->subCategories as $subCategory)
                        <li>
                          {{$subCategory->name}}
                        </li>
                        @endforeach
                      </ul>{{$product->price}}€
                    </li>
                    @endforeach
                  </ul>
                  <h5>Venditore: {{$product->user->nickname}}</h5>
                  <h6>Utente verificato</h6>
                  <h6>Utente dal: {{\Carbon\Carbon::parse($product->user->created_at)->format('d/m/y')}}</h6>
                  <p class="card-text"></p>
                  <p class="card-text"><small class="text-body-secondary">Ultimo aggiornamento: {{\Carbon\Carbon::parse($product->udate_at)->format('d/m/y')}}</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </x-layout>
  