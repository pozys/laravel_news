@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('content')
<div class="row mb-2">
    @foreach ($feedbacks as $item)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{ $item->user_name }}</h3>
                <p class="mb-auto">{{ $item->added_on }}...</p>
                <a href=" {{ route('feedback.show', $item->id) }} ">Просмотреть</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection