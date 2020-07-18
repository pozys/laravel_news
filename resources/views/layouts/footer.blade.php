@section('footer')
<footer class="blog-footer">
<p><a href="{{ route('info_requests.create') }}">Оставить заявку на выгрузку данных</a></p>    
<p>&copy; Сайт с самыми актуальными новостями со всего света! <a href="{{ route('feedback.create') }}">Свяжитесь с нами</a></p>
    <p>
        <a href="#">Вверх</a>
    </p>
    
</footer>
@endsection