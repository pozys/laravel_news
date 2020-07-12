@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Добавление категории
@endsection

@section('content')
<form action="{{ route('admin.addCategory') }}" method="POST">
    <div class="form-group">
        @csrf
        <input type="text" class="form-control" name="name" placeholder="Наименование категории"><br>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
</form>
@endsection