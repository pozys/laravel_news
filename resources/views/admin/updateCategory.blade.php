@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('content')
@foreach ($categories as $item)
<div class="row mb-2">
    <h3 class="mb-0">{{ $item->name }}</h3>
    <a href=" {{ route('categories.edit', $item->id) }} ">Изменить</a>/
    <a href=" {{ route('categories.destroy', $item->id) }} ">Удалить</a><br>
</div>
@endforeach
@endsection