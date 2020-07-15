@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Панель администратора
@endsection


@section('content')

<!-- @if($errors->isEmpty() && !empty($success_text))
<x-success :success-text="$success_text"/>
@endif -->
<a href=" {{ route('news.create') }} ">Добавить новость</a><br><hr>
<a href=" {{ route('categories.create') }} ">Добавить категорию</a><br><hr>
<a href=" {{ route('news.index') }} ">Редактировать новости</a><br><hr>
<a href=" {{ route('categories.index') }} ">Редактировать категории</a><br><hr>
<a href=" {{ route('feedback.index') }} ">Удалить данные обратной связи</a><br><hr>
<a href=" {{ route('info_requests.index') }} ">Удалить запросы на получение информации</a><br><hr>
@endsection