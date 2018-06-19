    <aside>
        <ul>
            <li>
                <a href="{{ route('home') }}"><img src="{{ url("images/icons/news.png") }}"></a>
                <a href="{{ route('home') }}">{{ __('Main') }}</a>
            </li>
            <li>
                <a href="{{ route('events') }}"><img src="{{ url("images/icons/events.png") }}"></a>
                <a href="{{ route('events') }}">{{ __('Events') }}</a>
            </li>
            <li>
                <a href=""><img src="{{ url("images/icons/map.png") }}"></a>
                <a href="">Места</a>
            </li>
            <li>
                <a href=""><img src="{{ url("images/icons/library.png") }}"></a>
                <a href="">Библиотека</a>
            </li>
        </ul>
        <hr />
        <ul>
            <li>
                <img src="{{ url("images/icons/message.png") }}">
                <a href="">Мои сообщения</a>
            </li>
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
    </aside>