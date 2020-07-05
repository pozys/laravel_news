@extends('layouts.main')
@extends('layouts.menu')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Запрос информации
@endsection

@section('content')
<form action="{{ route('addRequest') }}" method="POST">
    <div class="form-group">
        @csrf
        <label>Какую инфомацию Вы хотели бы получить?
        <input type="text" class="form-control" name="user_name" placeholder="Ваше имя" value="{{ old('user_name') }}"></label> <br>
        <input type="tel" class="form-control" name="phone" placeholder="Телефон в формате +7xxx-xxx-xx-xx" pattern="\+7[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" value="{{ old('phone') }}"></label> <br>
        <input type="email" class="form-control" name="mail" placeholder="Ваша электронная почта" value="{{ old('mail') }}"></label> <br>
        <textarea class="form-control" name="request_text" cols="30" rows="10" placeholder="Текст запроса">{{ old('request_text') }}</textarea><br>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>
@endsection