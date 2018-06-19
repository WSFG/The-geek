@extends('admin.index')
@section('content')
    <div class="content">
        <div class="dashboard-container user-count-info">
            <div class="dashboard-block-middle">
                <div>
                    <h2>Количество пользователей</h2>
                    <label class="checkbox-container" for="user-count-all">
                        Всего пользователей
                        <input type="checkbox" checked value="0" name="user-count-settings" id="user-count-all">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container" for="user-count-active">
                        Активных пользователей
                        <input type="checkbox" value="1" name="user-count-settings" id="user-count-active">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container" for="user-count-verified">
                        Верифицированных пользователй
                        <input type="checkbox" value="2" name="user-count-settings" id="user-count-verified">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container" for="user-count-not-active">
                        Неактивных пользователей
                        <input type="checkbox" value="3" name="user-count-settings" id="user-count-not-active">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div id="user-count"></div>
            </div>
            <div class="dashboard-block-middle">
                <h2>Расположение пользователей</h2>
                <div id="user-map"></div>
            </div>
        </div>
        <div class="dashboard-container statistic">
            <!--Users-->
            <div id="user-all" class="dashboard-block-small">
                <h3>Всего пользователей</h3>
                <h3 class="spincrement">{{ $allUserCount }}</h3>
            </div>
            <div id="user-validate" class="dashboard-block-small">
                <h3>Верифицированных пользователй</h3>
                <h3 class="spincrement">{{ $verificationUserCount }}</h3>
            </div>
            <div id="user-online" class="dashboard-block-small">
                <h3>В сети</h3>
                <h3 class="spincrement">{{ $onlineUserCount }}</h3>
            </div>
            <div id="user-not-active" class="dashboard-block-small">
                <h3>Неактивных пользователей</h3>
                <h3 class="spincrement">{{ $notActiveUserCount }}</h3>
            </div>
            <!--Records-->
            <div id="articles-all" class="dashboard-block-small">
                <h3>Количество статей</h3>
                <h3 class="spincrement">{{ $articlesCount }}</h3>
            </div>
            <div id="events-all" class="dashboard-block-small">
                <h3>Количество событий</h3>
                <h3 class="spincrement">{{ $eventsCount }}</h3>
            </div>
            <div id="news-all" class="dashboard-block-small">
                <h3>Количество новостей</h3>
                <h3 class="spincrement">{{ $newsCount }}</h3>
            </div>
            <div id="places-all" class="dashboard-block-small">
                <h3>Количество мест</h3>
                <h3 class="spincrement">{{ $placesCount }}</h3>
            </div>
        </div>
    </div>
@endsection