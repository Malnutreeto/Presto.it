<ul>
    @foreach ($products as $product)
        <li>
            {{$product->title}}
            <ul>
                <li>
                    {{$product->user->name}}
                </li>
                @foreach ($product->categories as $category)
                    <li>
                        {{$category->name ?? 'null'}}
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>