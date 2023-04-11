<x-layout>
    <ul>
        @forelse ($products as $product)
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
            @empty
            <p>Non ci sono prodotti</p>
            <form action="{{route('product.destroy', $product)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Cancella</button>
            </form>
        @endforelse
    </ul>
</x-layout>
