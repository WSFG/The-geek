<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'The GEEK') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/Default/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Newspaper/main.css') }}" />
</head>
<body>
<header>
    <nav>
        <div class="search-container">
            <label class="search">
                <input type="text" id="search" name="search" placeholder="Поиск">
                <img src="images/icons/search.png">
            </label>
        </div>
        <div class="user-menu">
            <div class="header-menu">
                <div class="header-menu-item">
                    <img src="images/icons/friends.png">
                </div>
                <div class="header-menu-item">
                    <img src="images/icons/message.png">
                </div>
                <div class="header-menu-item">
                    <img src="images/icons/photo.png">
                </div>
                <div class="header-menu-item">
                    <img src="images/icons/place.png">
                </div>
                <div class="header-menu-item">
                    <img src="images/icons/event_new.png">
                </div>
            </div>
            <div class="user-activity">
                @guest
                    <a class="open-modal" data-modal="#login" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <img src="images/icons/enter.png">
                @else
                    <a href="{{ url('/user/' . $user->id) }}">
                        <p>Имя Пользователя</p>
                        <img class="header-user-photo" src="images/default-user-image.png">
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
                @endguest
            </div>
        </div>
    </nav>
    <div class="header">
        <div class="header-description">
            <h2>Интернет-площадка о современной культуре и развлечениях</h2>
            <a href="#">О нас</a>
        </div>
        <div class="header-title">
            <h1>The Geek</h1>
        </div>
        <div class="header-time">
            <h2><span class="time">26 мая 2018 г.</span></h2>
            <a>События сегодня <img src="images/icons/events_today.png"></a>
        </div>
    </div>
</header>
@yield("content")
@include('auth.login')
<script src="{{ URL::asset('js/jquery/jquery-3.3.1.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>
