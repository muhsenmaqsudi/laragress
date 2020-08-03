@foreach($parentCategories as $category)
    {{$category->name}}
    @includeWhen(count($category->subcategory), 'category.subCategoryList', ['subcategories' => $category->subcategory])
@endforeach
