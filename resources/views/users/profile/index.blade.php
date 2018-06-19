@extends('layouts.app')

@section('content')
    <script>
        $("header").addClass("header_user_page")
        $("nav").prepend("<div><h1>{{ config('app.name', 'The Geek') }}</h1></div>");
    </script>
<main class="main_user_page">
    @include('aside')
    <section class="content user-page">
        <div class="user-profile-info">
            <div class="profile-user-photo">
                <div class="profile-user-photo-button">
                    <div class="profile-user-photo-container">
                        <img class="profile-user-photo-image" src="{{ url($currentUser->getMainImage()->path) }}"
                             alt="{{ $currentUser->name . ' ' . $currentUser->surname }}" />
                        @if($user->id == $currentUser->id)
                            <div class="profile-user-photo-hover">
                                <div class="upload-user-main-photo">
                                    {{ __('Upload photo') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="user-buttons">
                        @if($user->id == $currentUser->id)
                            <a class="to_edit_user">{{ __('Edit') }}</a>
                        @else
                        <button class="user-button">{{ __('Write message') }}</button>
                        <div class="user-more-container">
                            <button class="user-button">{{ __('Add friend') }}</button>
                            <div class="user-more"></div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="profile-user-additional">
                <div class="profile-user-main-info">
                    <h2 class="profile-user-name">{{ $currentUser->name . ' ' . $currentUser->surname }}</h2>
                    <span class="profile-user-status">
                        @if($currentUser->isOnline())
                            {{ _('Online') }}
                        @else
                            {{ $currentUser->last_login }}
                        @endif
                    </span>
                </div>
                <!--TODO: Иконка дня рождения-->
                <div class="birthday">{{ $currentUser->calculate_age() }} {{ __('years old') }} ({{ $currentUser->birthday }})</div>
                <!--TODO: Иконка телефона-->
                <div class="phone">{{ $currentUser->phone_number }}</div>
                <!--TODO: Иконка Email-->
                <div class="email">{{ $currentUser->email }}</div>
                <!--TODO: Иконка скайпа-->
                <div class="skype">Kolesnikov Roman</div>
                <div class="profile-user-social">
                    <!--TODO: Иконки социальных сетей-->
                    <span class="vk"></span>
                    <span class="facebook"></span>
                    <span class="twitter"></span>
                    <span class="instagram"></span>
                </div>
            </div>
        </div>
        <div class="profile-user-menu">
            <div class="profile-user-menu-item" data-id="activity">{{ _('Activity') }}</div>
            <div class="profile-user-menu-item" data-id="friends">{{ _('Friends') }}</div>
            <div class="profile-user-menu-item" data-id="events">{{ _('Events') }}</div>
            <div class="profile-user-menu-item" data-id="places">{{ _('Places') }}</div>
            <div class="profile-user-menu-item" data-id="photos">{{ _('Photos') }}</div>
            <div class="profile-user-menu-item" data-id="achievements">{{ _('Achievements') }}</div>
        </div>
        <div class="profile-user-content">
            <section id="activity" class="profile-user-content-container">
                <ul class="cbp_tmtimeline">
                    @foreach($user->activities as $activity)
                        <li>
                            <time class="cbp_tmtime" datetime="{{ $activity->created_at->toDateTimeString() }}">
                                <span>{{ $activity->created_at->nowWithSameTz()->format('m/d/Y') }}</span>
                                <span>{{ $activity->created_at->nowWithSameTz()->format('H:i') }}</span>
                            </time>
                            <img src="{{ $activity->type()[0]->icon }}" alt="{{ $activity->type()[0]->type }}">
                            <div class="cbp_tmlabel">
                                <h2>{{ $activity->text }}</h2>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>
            <section id="friends" class="profile-user-content-container">
                @foreach($currentUser->friends($currentUser->id) as $friend)
                    <article class="friend">
                        <a href="{{ url('/user/' . $friend->id) }}">
                            <img src="{{ url($friend->getMainImage()->path) }}" alt="{{ $friend->name . ' ' . $friend->surname }}">
                        </a>
                        <div class="friend_description">
                            <a href="{{ url('/user/' . $friend->id) }}">
                                <h4>{{ $friend->name . ' ' . $friend->surname }}</h4>
                            </a>
                            <p>Информфция о пользователе</p>
                            <a>Написать сообщение</a>
                        </div>
                    </article>
                    <hr/>
                @endforeach
            </section>
            <section id="events" class="profile-user-content-container">
                <!--TODO: Календарь-->
            </section>
            <section id="places" class="profile-user-content-container">
                <!--TODO: Карта-->
            </section>
            <section id="photos" class="profile-user-content-container">
                <!--TODO: Фото-->
                <div class="profile-user-photo-list">
                    <figure class="profile-user-photo-item">
                        <img src="img/13rw_203_04361r-380x215.jpg" alt="">
                    </figure>
                    <figure class="profile-user-photo-item">
                        <img src="img/39814594522_17f9fbbe81_k-min-380x215.jpg" alt="">
                    </figure>
                    <figure class="profile-user-photo-item">
                        <img src="img/default-user-image.png" alt="">
                    </figure>
                    <figure class="profile-user-photo-item">
                        <img src="img/Detroit-Become-Human.jpg" alt="">
                    </figure>
                    <figure class="profile-user-photo-item">
                        <img src="img/13rw_203_04361r-380x215.jpg" alt="">
                    </figure>
                    <figure class="profile-user-photo-item">
                        <img src="img/39814594522_17f9fbbe81_k-min-380x215.jpg" alt="">
                    </figure>
                    <figure class="profile-user-photo-item">
                        <img src="img/default-user-image.png" alt="">
                    </figure>
                    <figure class="profile-user-photo-item">
                        <img src="img/Detroit-Become-Human.jpg" alt="">
                    </figure>
                </div>
            </section>
            <section id="achievements" class="profile-user-achievements-container">
                <!--TODO: Награды-->
            </section>
        </div>
    </section>
</main>
@endsection