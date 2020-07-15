@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Редактирование новости
@endsection

@section('content')
<form action="{{ route('categories.update', $category->id) }}" method="POST">
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
        <input type="text" class="form-control" name="name" placeholder="Наименование категории" value="{{$category->name}}"><br>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </div>
</form>
@endsection