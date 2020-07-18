@extends('layouts.main')
@extends('layouts.footer')
@extends('layouts.header')

@section('title')
Профили пользователей
@endsection

@section('content')
<h3>Профили пользователей</h3><br>
<div class="row mb-2">
    @foreach ($users as $user)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{ $user->name }}</h3>
                <p class="mb-auto">{{ $user->email }}</p>
                <p class="mb-auto">Создан: {{ $user->created_at }}</p>
                <p class="mb-auto">Это администратор: @if ($user->is_admin === false) Нет @else Да @endif</p>
                <a href=" {{ route('users.edit', $user->id) }} ">Изменить</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $users->links() }}
@endsection