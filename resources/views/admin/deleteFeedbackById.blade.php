@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Удаление обратной связи
@endsection

@section('content')
<form action="{{ route('admin.deleteFeedbackById', $feedback->id) }}" method="POST">
    {{ method_field('DELETE') }}
    <div class="form-group">
        @csrf
        <input type="text" class="form-control" name="title" value="{{$feedback->added_on}}" readonly><br>
        <input type="text" class="form-control" name="brief" value="{{$feedback->user_name}}" readonly><br>
        <textarea name="body" rows="20" class="form-control" readonly>{{$feedback->feedback_text}}</textarea><br>

        <button type="submit" class="btn btn-primary">Удалить</button>
    </div>
</form>
@endsection