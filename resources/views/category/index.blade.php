<h2>Main Categories</h2>
@foreach ($mainCategories as $maincategory)
    <ul>
        <li>
            <a href="{{route('category.edit', $maincategory)}}">{{$maincategory->name}}</a>
            @foreach ( $maincategory->subcategories() as $subCategory)
                {{$subCategory}}
            @endforeach
            <form action=""></form>
            <form class="text-center" method="POST" action="{{route('category.destroy', $maincategory)}}">
                @csrf
                @method('DELETE')
                <div class="col-12">
                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                </div>
            </form>
        </li>
    </ul>
@endforeach
<h2>Sub categorie</h2>
@foreach ($subCategories as $subCategory)
    <ul>
        <li>
            <a href="{{route('sub_category.edit', $subCategory)}}">{{$subCategory->name}}</a>
            <form class="text-center" method="POST" action="{{route('sub_category.destroy', $subCategory)}}">
                @csrf
                @method('DELETE')
                <div class="col-12">
                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                </div>
            </form>
        </li>
    </ul>
@endforeach