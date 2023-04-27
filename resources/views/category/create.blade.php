<x-layout>
    @vite(['resources/js/category.js'])
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">{{ __('ui.add_category') }}</h1>
            </div>
            <div class="col-12">
                <select class="form-select" aria-label="Default select example" id="select">
                    <option value="main" selected>{{ __('ui.main_category') }}</option>
                    <option value="sub">{{ __('ui.sub_category') }}</option>
                </select>
                <form class="text-center" method="POST" action="{{ route('category.store') }}" id="main">
                    @csrf
                    <div class="mb-3">
                        <input name="name" type="text" placeholder="nome" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
                    </div>
                    <div class="row">
                        <input name="icon" type="hidden" placeholder="" class="form-control"
                        id="iconInput" aria-describedby="emailHelp" value="">
                        <div class="accordion" id="iconAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        {{ __('ui.choose_icon') }}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#iconAccordion">
                                    <div class="accordion-body" >
                                    </div>
                                </div>
                            </div>  
                        </div>
                        @foreach ($subCategories as $subCategory)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="subCategories[]"
                                    value="{{ $subCategory->id }}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $subCategory->name }}
                                </label>
                            </div>
                        @endforeach
                        @if ($errors->has('name'))
                            {{ $errors->first('name') }}
                        @endif
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary m-2">{{ __('ui.submit') }}</button>
                        </div>
                </form>
                <form class="text-center d-none" method="POST" action="{{ route('sub_category.store') }}"
                    id="sub">
                    @csrf
                    <div class="mb-3">
                        <input name="name" type="text" placeholder="nome" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" value="">
                    </div>
                    @if ($errors->has('name'))
                        {{ $errors->first('name') }}
                    @endif
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary m-2">{{ __('ui.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
