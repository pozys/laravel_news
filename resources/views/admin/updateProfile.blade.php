@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Редактирование профиля пользователя
@endsection

@section('content')
<form action="{{ route('users.update', $user->id) }}" method="POST">
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
        <input type="text" class="form-control" name="name" placeholder="Имя пользователя" value="{{$user->name}}"><br>

        @if($errors->has('email'))
            <div class="alert alert-danger">
                    @foreach($errors->get('email') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
        @endif
        <input type="email" class="form-control" rows="60" name="email" placeholder="Электронная почта" value="{{$user->email}}"><br>

        <input type="text" name="created_at" class="form-control" value="{{$user->created_at}}" readonly><br>

        <h4 class="mb-0">Это администратор:</h4>
        @if($errors->has('is_admin'))
            <div class="alert alert-danger">
                    @foreach($errors->get('is_admin') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
        @endif
        <p>
            <input type="radio" class="form-control" name="is_admin" value="1" @if($user->is_admin == 1) checked @endif>Да<br>
            <input type="radio" class="form-control" name="is_admin" value="0" @if($user->is_admin == 0) checked @endif>Нет<br>
        </p>

        <button type="submit" class="btn btn-primary">Изменить</button>
    </div>
</form>
@endsection