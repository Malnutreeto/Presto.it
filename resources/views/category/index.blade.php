<x-layout>
    <table class="table table-bordered border-primary">
        <thead>
          <tr>
            <th scope="col">Categorie</th>
            <th scope="col">Categorie correlate</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($mainCategories as $mainCategory)
                <tr>
                    <td>{{$mainCategory->name}}</td>
                    @foreach ( $mainCategory->subcategories as $subCategory)
                        <td>{{$subCategory->name}}</td>
                    @endforeach
                </tr>  
            @endforeach
        </tbody>
      </table>
</x-layout>
