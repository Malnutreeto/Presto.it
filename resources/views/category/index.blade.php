<x-layout>
    <h2>Main Categories</h2>
    @foreach ($mainCategories as $maincategory)
        <ul class="list-group d-flex justify-content-center">
            <li class="list-group-item">
                <a href="{{route('category.edit', $maincategory)}}">{{$maincategory->name}}</a>
                <form class="text-center" method="POST" action="{{route('category.destroy', $maincategory)}}">
                    @csrf
                    @method('DELETE')
                    <div class="col-12">
                        <button type="submit" class="btn btn-sm btn-danger m-2">Cancella</button>
                    </div>
                </form>
                <ul class="list-group">
                    <H4>Sotto categorie di {{$maincategory->name}}</H4>
                    @foreach ( $maincategory->subcategories as $subCategory)
                        <li class="list-group-item">
                            <a href="{{route('category.edit', $subCategory)}}">{{$subCategory->name}}</a>
                            <form class="text-center" method="POST" action="{{route('sub_category.destroy', $subCategory)}}">
                                @csrf
                                @method('DELETE')
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-danger m-2">Cancella</button>
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    @endforeach
</x-layout>
