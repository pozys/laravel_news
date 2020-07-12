@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Добавление новости
@endsection

@section('content')
<form action="{{ route('admin.addNews') }}" method="POST">
    <div class="form-group">
        @csrf
        <input type="text" class="form-control" name="title" placeholder="Заголовок новости"><br>
        <input type="text" class="form-control" name="brief" placeholder="Краткое описание новости"><br>
        <textarea name="body" class="form-control" rows="20" placeholder="Текст новости"></textarea><br>
        <h4 class="mb-0">Источник новости:</h4>
        <p>
            @foreach ($sources as $source)
            <input type="radio" class="form-control" name="source_id" value="{{ $source->id }}" >{{ $source->source }}<br>
            @endforeach
        </p>

        <h4 class="mb-0">Категория новости:</h4>
        <p>
            @foreach ($categories as $category)
            <input type="checkbox" class="form-control" name="category_id[]" value="{{ $category->id }}" >{{ $category->name }}<br>
            @endforeach
        </p>
        <button type="submit" class="btn btn-primary">Добавить</button>

    </div>
</form>
@endsection