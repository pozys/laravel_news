@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('content')
<div class="row mb-2">
    @foreach ($news as $item)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{ $item->title }}</h3>
                <p class="mb-auto">{{ $item->brief }}...</p>
                <a href=" {{ route('admin.updateNewsById', $item->id) }} ">Изменить</a>
                <a href=" {{ route('admin.deleteNews', $item->id) }} ">Удалить</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $news->links() }}
@endsection