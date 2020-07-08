@section('menu')

@foreach ($categories as $category)
<a href=' {{ route("categories.getNewsByCategoryId", $category->id) }} '> {{ $category->name }} </a>
@endforeach
@endsection