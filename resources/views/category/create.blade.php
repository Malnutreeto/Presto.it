<x-layout>
    @vite(['resources/js/category.js'])
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Aggiungi categorie</h1>
            </div>
            <div class="col-12">
                <select class="form-select" aria-label="Default select example" id="select">
                    <option value="main" selected>Categorie principali</option>
                    <option value="sub">Sotto categorie</option>
                  </select>
                  <form class="text-center" method="POST" action="{{route('category.store')}}" id="main">
                    @csrf
                    <div class="mb-3">
                        <input name="name" type="text" placeholder="nome" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <span class="input-group-text d-flex justify-content-center" ><i class=" fs-2" id="icon"></i></span>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Accordion Item #1
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body" id="iconSelect">
                                </div>
                              </div>
                            </div>
                        {{-- <div class="col-11">
                            <select class="form-select" aria-label="Default select example"  name="icon" >
                                <option value="" selected disabled>Scegli un icona</option>
                            </select>
                        </div> --}}
                    </div>
                    @foreach ($subCategories as $subCategory)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="subCategories[]" value="{{$subCategory->id}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$subCategory->name}}
                        </label>
                    </div>
                    @endforeach
                    @if($errors->has('name'))
                        {{$errors->first('name')}}
                    @endif
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary m-2">Submit</button>
                    </div>
                </form>
                <form class="text-center d-none" method="POST" action="{{route('sub_category.store')}}" id="sub">
                    @csrf
                    <div class="mb-3">
                        <input name="name" type="text" placeholder="nome" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
                    </div>
                    @if($errors->has('name'))
                        {{$errors->first('name')}}
                    @endif
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary m-2">Submit</button>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</x-layout>
