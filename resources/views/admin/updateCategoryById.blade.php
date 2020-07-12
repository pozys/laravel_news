@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Редактирование новости
@endsection

@section('content')
<form action="{{ route('admin.updateCategoryById', $category->id) }}" method="POST">
    <div class="form-group">
        @csrf
        <input type="text" class="form-control" name="name" placeholder="Наименование категории" value="{{$category->name}}"><br>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </div>
</form>
@endsection