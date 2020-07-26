@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('content')
@foreach ($resources as $item)
<div class="row mb-2">
    <h3 class="mb-0">{{ $item->resource }}</h3>
    <a href=" {{ route('resources.edit', $item->id) }} ">Изменить</a>/
    <a href=" {{ route('resources.destroy', $item->id) }} ">Удалить</a><br>
</div>
@endforeach
@endsection