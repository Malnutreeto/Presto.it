<x-layout>
    @vite(['resources/css/product-create.css','resources/js/product-create.js'])
    <div class="container-fluid">
        <h1 class="text-center">{{ __('ui.new_announcement') }}</h1>
        <h5 class="text-center text-secondary">{{ __('ui.this') }}</h5>
          <div class="col-12">
            <livewire:create-product :mainCategories="$mainCategories" :products="$products" />
        </div>
    </div>
</x-layout>
