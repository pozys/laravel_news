@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
@if (Auth::user()->is_admin)
Удаление обратной связи
@else
Ваш отзыв
@endif
@endsection

@section('content')
<form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST">
    {{ method_field('DELETE') }}
    <div class="form-group">
        @csrf
        <input type="text" class="form-control" name="title" value="{{$feedback->added_on}}" readonly><br>
        <input type="text" class="form-control" name="brief" value="{{$feedback->user_name}}" readonly><br>
        <textarea name="body" rows="20" class="form-control" readonly>{{$feedback->feedback_text}}</textarea><br>
        @if (Auth::user()->is_admin)
        <button type="submit" class="btn btn-primary">Удалить</button>
        @endif
    </div>
</form>
@endsection