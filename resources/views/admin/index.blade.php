@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Панель администратора
@endsection

@section('content')
<a href=" {{ route('admin.addNews') }} ">Добавить новость</a><br><hr>
<a href=" {{ route('admin.addCategory') }} ">Добавить категорию</a><br><hr>
<a href=" {{ route('admin.updateNews') }} ">Редактировать новости</a><br><hr>
<a href=" {{ route('admin.updateCategory') }} ">Редактировать категории</a><br><hr>
<a href=" {{ route('admin.deleteFeedback') }} ">Удалить данные обратной связи</a><br><hr>
<a href=" {{ route('admin.deleteRequest') }} ">Удалить запросы на получение информации</a><br><hr>
@endsection