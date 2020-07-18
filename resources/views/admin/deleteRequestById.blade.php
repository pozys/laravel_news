@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
@if (Auth::user()->is_admin)
Удаление запроса на получение информации
@else
Ваш запрос
@endif
@endsection

@section('content')
<form action="{{ route('info_requests.destroy', $request->id) }}" method="POST">
    {{ method_field('DELETE') }}
    <div class="form-group">
        @csrf
        <input type="text" class="form-control" name="title" value="{{$request->get_on}}" readonly><br>
        <input type="text" class="form-control" name="brief" value="{{$request->user_name}}" readonly><br>
        <input type="tel" class="form-control" name="phone" value="{{ $request->phone }}" readonly><br>
        <input type="email" class="form-control" name="mail" value="{{ $request->mail }}" readonly> <br>
        <textarea name="body" rows="20" class="form-control" readonly>{{$request->request_text}}</textarea><br>

        @if (Auth::user()->is_admin)
        <button type="submit" class="btn btn-primary">Удалить</button>
        @endif
    </div>
</form>
@endsection