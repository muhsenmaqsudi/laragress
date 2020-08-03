@foreach($subcategories as $subcategory)
    <ul>
        <li>{{$subcategory->name}}</li>
        @includeWhen(count($subcategory->subcategory), 'category.subCategoryList', ['subcategories' => $subcategory->subcategory])
    </ul>
@endforeach
