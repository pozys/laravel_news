@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Добавление новости
@endsection

@section('content')
<form action="{{ route('news.store') }}" method="POST">
    <div class="form-group">
        @csrf
        @if($errors->has('title'))
        <div class="alert alert-danger">
            @foreach($errors->get('title') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{old('title')}}"><br>

        @if($errors->has('brief'))
        <div class="alert alert-danger">
            @foreach($errors->get('brief') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <input type="text" class="form-control" name="brief" placeholder="Краткое описание новости" value="{{old('brief')}}" }><br>

        @if($errors->has('body'))
        <div class="alert alert-danger">
            @foreach($errors->get('body') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <textarea name="body" class="form-control" rows="20" placeholder="Текст новости" id="inform" value="{{old('title')}}"></textarea><br>

        <h4 class="mb-0">Источник новости:</h4>
        @if($errors->has('source_id'))
        <div class="alert alert-danger">
            @foreach($errors->get('source_id') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <p>
            @foreach ($sources as $source)
            <input type="radio" class="form-control" name="source_id" value="{{ $source->id }}">{{ $source->source }}<br>
            @endforeach
        </p>

        <h4 class="mb-0">Категория новости:</h4>
        @if($errors->has('category_id'))
        <div class="alert alert-danger">
            @foreach($errors->get('category_id') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <p>
            @foreach ($categories as $category)
            <input type="checkbox" class="form-control" name="category_id[]" value="{{ $category->id }}">{{ $category->name }}<br>
            @endforeach
        </p>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
</form>
<script>
    CKEDITOR.replace('inform', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        language: 'ru'
    });
</script>
@endsection