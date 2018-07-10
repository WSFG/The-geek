<aside>
    <div class="mobile user-menu-mobile">
        @guest
            <a class="open-modal" data-modal="#login" href="{{ route('login') }}">Вход</a>
            <img src="{{ url("/images/icons/enter.png") }}">
        @else
            <a href="{{ url('/user/' . Auth::user()->id) }}" class="user-activated">
                <p>{{ Auth::user()->name . ' ' . Auth::user()->surname }}</p>
                <img class="header-user-photo" src="{{ url(Auth::user()->getMainImage()->path) }}">
            </a>
        @endguest
    </div>
    <hr class="mobile">
    <ul>
        <li>
            <a href="{{ route('home') }}"><img src="{{ url("images/icons/news.png") }}"></a>
            <a href="{{ route('home') }}">Главная</a>
        </li>
        <li>
            <a href="{{ route('events') }}"><img src="{{ url("images/icons/events.png") }}"></a>
            <a href="{{ route('events') }}">События</a>
        </li>
        <li>
            <a href="{{ route('places') }}"><img src="{{ url("images/icons/map.png") }}"></a>
            <a href="{{ route('places') }}">Места</a>
        </li>
        <li>
            <a href="{{ route('article') }}"><img src="{{ url("images/icons/library.png") }}"></a>
            <a href="{{ route('article') }}">Библиотека</a>
        </li>
    </ul>
    <hr />
    <ul>
        @auth
            <li>
                <a href="{{ route('chat.index') }}"><img src="{{ url("images/icons/message.png") }}"></a>
                <a href="{{ route('chat.index') }}">Мои сообщения</a>
            </li>
        @endauth
        <li>
            <img src="{{ url("images/icons/settings.png") }}">
            <a href="">Настройки</a>
        </li>
    </ul>
    <hr />
    <ul>
        <li>
            <img src="{{ url("images/icons/help.png") }}">
            <a href="">Помощь</a>
        </li>
    </ul>
    <hr class="mobile">
    <div class="mobile mobile-logout">
            @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Выход
            </a>
        @endauth
    </div>
</aside>