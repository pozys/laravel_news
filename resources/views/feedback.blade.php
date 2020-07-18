@extends('layouts.main')
@extends('layouts.menu')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Форма обратной связи
@endsection

@section('content')
<form action="{{ route('feedback.store') }}" method="POST">
    <div class="form-group">
        @csrf
        <label>Ваше мнение о нашей работе
            <input type="text" class="form-control" name="user_name" placeholder="Ваше имя" value="{{ old('user_name') }}"></label> <br>
        <textarea class="form-control" name="feedback_text" cols="30" rows="10" placeholder="Что Вы думаете о нас...">{{ old('feedback_text') }}</textarea><br>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>
@endsection