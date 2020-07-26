@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Редактирование источника
@endsection

@section('content')
<form action="{{ route('resources.update', $resource->id) }}" method="POST">
    @method('PUT')
    <div class="form-group">
        @csrf
        @if($errors->has('name'))
        <div class="alert alert-danger">
            @foreach($errors->get('name') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <input type="text" class="form-control" name="name" placeholder="Наименование ресурса" value="{{$resource->name}}"><br>

        @if($errors->has('resource'))
        <div class="alert alert-danger">
            @foreach($errors->get('resource') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <input type="text" class="form-control" name="resource" placeholder="Адрес ресурса" value="{{$resource->resource}}"><br>

        <h4 class="mb-0">Новостной источник:</h4>
        @if($errors->has('source_id'))
        <div class="alert alert-danger">
            @foreach($errors->get('source_id') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <p>
            @foreach ($sources as $source)
            <input type="radio" class="form-control" name="source_id" value="{{ $source->id }}" @if($resource->source_id == $source->id) checked @endif>{{ $source->source }}<br>
            @endforeach
        </p>

        <h4 class="mb-0">Категория новостей с данного ресурса (по умолчанию):</h4>
        @if($errors->has('category_id'))
        <div class="alert alert-danger">
            @foreach($errors->get('category_id') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <p>
            @foreach ($categories as $category)
            <input type="radio" class="form-control" name="category_id" value="{{ $category->id }}" @if($resource->category_id === $category->id) checked @endif>{{ $category->name }}<br>
            @endforeach
        </p>

        <button type="submit" class="btn btn-primary">Изменить</button>
    </div>
</form>
@endsection