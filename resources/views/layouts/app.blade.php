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
                <input type="text" id="search" name="search" />
            </label>
        </div>
        <div class="user-menu">
            <div class="header-menu">
                <div class="header-menu-item">
                    <!--TODO: Иконка друзей -->
                </div>
                <div class="header-menu-item">
                    <!--TODO: Иконка сообщений -->
                </div>
                <div class="header-menu-item">
                    <!--TODO: Иконка уведомлений -->
                </div>
                <div class="header-menu-item">
                    <!--TODO: Иконка фото -->
                </div>
                <div class="header-menu-item">
                    <!--TODO: Иконка мест -->
                </div>
                <div class="header-menu-item">
                    <!--TODO: Иконка событий -->
                </div>
                <div class="header-menu-item">
                    <!--TODO: Иконка помощи -->
                </div>
            </div>
            <div class="user-activity">
                @if (Route::has('login'))
                    @guest
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    @else
                        <a href="{{ url('user/' . $user->id) }}"><img class="header-user-photo" src="{{ url($user->user_main_photo) }}" /></a>
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
                @endif
            </div>
        </div>
    </nav>
    <div class="header">
        <div class="header-description">
            <!--TODO: Описание-->
            Описание
        </div>
        <div class="header-title">
            <h1>The Geek</h1>
        </div>
        <div class="header-time">
            <span class="time"></span>
        </div>
    </div>
</header>
@yield("content")
<script src="{{ URL::asset('js/jquery/jquery-3.3.1.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>
