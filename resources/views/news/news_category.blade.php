@extends('layouts.main')
@extends('layouts.menu')
@extends('layouts.footer')
@extends('layouts.header')

@section('content')
<div class="row mb-2">
    @foreach ($news as $key => $item)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{ $item['title'] }}</h3>
                <p class="mb-auto">{{ substr($item['body'], 0, 200) }}...</p>
                <a href=" {{ route('news.getNewsById', $key) }} " class="stretched-link">Читать дальше..</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                </svg>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection