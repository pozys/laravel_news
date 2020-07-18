@section('header')

<div class="col-4 text-center">
    <a class="blog-header-logo text-dark" href="{{route('index')}}">Вести</a>
</div>
<div class="col-4 d-flex justify-content-end align-items-center">
    <a class="text-muted" href="#" aria-label="Search">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false">
            <title>Поиск</title>
            <circle cx="10.5" cy="10.5" r="7.5" />
            <path d="M21 21l-5.2-5.2" />
        </svg>
    </a>
    @if(Auth::check())
    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.index') }}">@if (Auth::user()->is_admin) Панель администратора @else Личный кабинет @endif</a>&nbsp;
    <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}">Выйти</a>
    @else
    <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Вход</a>&nbsp;
    <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Регистрация</a>
    @endif
</div>
@endsection