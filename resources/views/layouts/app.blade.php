<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">

    <title>{{ config('app.name', 'The GEEK') }}</title>

    <!-- Styles -->
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />--}}
    <link rel="stylesheet" href="{{ asset('css/Default/library/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Default/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Default/mobile.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Newspaper/main.css') }}" />
    <!-- Scripts -->
    <script src="{{ URL::asset('js/jquery/jquery-3.3.1.js') }}"></script>
    <script src="{{ URL::asset('js/jquery/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('js/library/jquery.mobile-events.js') }}"></script>
    <script src="{{ URL::asset('js/library/moment.min.js') }}"></script>
    <script src="{{ URL::asset('js/library/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
</head>
<body>
<header>
    <nav>
        <div class="search-container">
            <label class="search">
                <form type="GET" action="{{ route('search') }}">
                    <input type="text" id="search" name="search" placeholder="Поиск">
                    <img id="search-send" src="{{ url("/images/icons/search.png") }}">
                </form>
            </label>
        </div>
        <div class="user-menu">
            @auth
                <div class="header-menu">
                    <div class="header-menu-item">
                        <img src="{{ url("/images/icons/friends.png") }}">
                    </div>
                    <div class="header-menu-item">
                        <img src="{{ url("/images/icons/message.png") }}">
                    </div>
                    <div class="header-menu-item">
                        <img src="{{ url("/images/icons/photo.png") }}">
                    </div>
                    <div class="header-menu-item">
                        <img src="{{ url("/images/icons/place.png") }}">
                    </div>
                    <div class="header-menu-item">
                        <img src="{{ url("/images/icons/event_new.png") }}">
                    </div>
                </div>
            @endauth
            <div class="user-activity">
                @guest
                    <a class="open-modal" data-modal="#login" href="{{ route('login') }}">Вход</a>
                    <img src="{{ url("/images/icons/enter.png") }}">
                @else
                    <a href="{{ url('/user/' . Auth::user()->id) }}" class="user-activated">
                        <p>{{ Auth::user()->name . ' ' . Auth::user()->surname }}</p>
                        <img class="header-user-photo" src="{{ url(Auth::user()->getMainImage()->path) }}">
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <ul class="user-action">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Выход
                        </a>
                    </ul>
                @endguest
            </div>
        </div>
    </nav>
    <div class="mobile mobile-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="header">
        <div class="header-description">
            <h2>Интернет-площадка о современной культуре и развлечениях</h2>
            <a href="#">О нас</a>
        </div>
        <div class="header-title">
            <h1>{{ config('app.name', 'The Geek') }}</h1>
        </div>
        <div class="header-time">
            <h2><span class="time">26 мая 2018 г.</span></h2>
            <a>События сегодня <img src="{{ url("/images/icons/events_today.png") }}"></a>
        </div>
    </div>
</header>
<div id="app">
    @yield("content")
    @include('auth.login')
    @include('auth.register.index')
    @include('auth.passwords.reset')
</div>
<script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
