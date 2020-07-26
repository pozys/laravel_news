@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Панель администратора
@endsection

@section('content')


<a href=" {{ route('news.create') }} ">Добавить новость</a><br><hr>
<a href=" {{ route('categories.create') }} ">Добавить категорию</a><br><hr>
<a href=" {{ route('resources.create') }} ">Добавить новостной ресурс</a><br><hr>
<a href=" {{ route('news.index') }} ">Редактировать новости</a><br><hr>
<a href=" {{ route('categories.index') }} ">Редактировать категории</a><br><hr>
<a href=" {{ route('resources.index') }} ">Редактировать новостные ресурсы</a><br><hr>
<a href=" {{ route('feedback.index') }} ">Удалить данные обратной связи</a><br><hr>
<a href=" {{ route('info_requests.index') }} ">Удалить запросы на получение информации</a><br><hr>
<a href=" {{ route('users.index') }} ">Редактировать профили пользователей</a><br><hr>
<a href=" {{ route('parseYandex') }} ">Загрузить новости Яндекс</a><br><hr>
@endsection