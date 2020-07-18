@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Личный кабинет
@endsection


@section('content')
<h3>Личный кабинет пользователя {{ Auth::user()->name }}</h3>
@endsection