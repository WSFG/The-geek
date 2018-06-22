<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'The GEEK') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ URL::asset('css/library/kendo/kendo.common.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/library/kendo/kendo.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/library/kendo/kendo.default.mobile.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/admin/main.css') }}">
    <script src="{{ URL::asset('js/library/moment.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery/jquery-3.3.1.js') }}"></script>
    <script src="{{ URL::asset('js/jquery/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('js/library/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('js/library/kendo/kendo.all.min.js') }}"></script>
    <script src="{{ URL::asset('js/library/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('js/library/jquery.spincrement.min.js') }}"></script>
    <script src="{{ URL::asset('js/library/dx.chartjs.js') }}"></script>
    <script src="{{ URL::asset('js/library/loader.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/admin.js') }}"></script>
</head>
<body>
<header>
    <nav>
        <div class="user-activity">
            <a href="{{ url('/user/' . $user->id) }}" class="user-activated">
                <p>{{ $user->name . ' ' . $user->surname }}</p>
                <img class="header-user-photo" src="{{ url($user->getMainImage()->path) }}">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <ul class="user-action">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </ul>
        </div>
    </nav>
</header>
<main>
        <aside>
            <ul>
                <li id="dashboard" class="active">
                    <a href='{{ route('adminDashboard') }}'>
                        <div class='fa fa-columns'></div>
                        Монитор
                    </a>
                </li>
                <li id="records" class='sub-menu'>
                    <a href='#'>
                        <div class='fa fa-newspaper'></div>
                        Записи
                        <div class='fa fa-caret-down right'></div>
                    </a>
                    <ul>
                        <li id="articles">
                            <a href='{{ route('adminArticles') }}'>
                                Статьи
                            </a>
                        </li>
                        <li id="events">
                            <a href='{{ route('adminEvents') }}'>
                                События
                            </a>
                        </li>
                        <li id="news">
                            <a href='{{ route('adminNews') }}'>
                                Новости
                            </a>
                        </li>
                        <li id="places">
                            <a href='{{ route('adminPlaces') }}'>
                                Места
                            </a>
                        </li>
                    </ul>
                </li>
                @if($user->type_of_user_id > 2)
                <li id="uesrs">
                    <a href='#'>
                        <div class='fa fa-user'></div>
                        Пользователи
                    </a>
                </li>
                @endif
                @if($user->type_of_user_id > 3)
                <li id="settings">
                    <a href='#'>
                        <div class='fa fa-cogs'></div>
                        Настройки
                    </a>
                </li>
                @endif
                <li id="help" class='sub-menu'>
                    <a href='#'>
                        <div class='fa fa-question-circle'></div>
                        Помощь
                        <div class='fa fa-caret-down right'></div>
                    </a>
                    <ul>
                        <li id="faq">
                            <a href='#'>
                                FAQ
                            </a>
                        </li>
                        <li id="status">
                            <a href='#'>
                                Статус сети
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        @yield("content")
    </main>
</body>
</html>