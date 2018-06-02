@extends('layouts.app')

@section('content')
<main class="full-page">
    @include('aside')
    <section class="content">
        <!--TODO: Страница пользователя-->
        <div class="user-profile-info">
            <div class="profile-user-photo">
                <div class="profile-user-photo-container">
                    <img class="profile-user-photo-image" src="" alt="{{ $currentUser->name . " " . $currentUser->surname }}" />
                    <div class="profile-user-photo-hover"></div>
                </div>
                <div class="profile-user-main-info">
                    <h2 class="profile-user-name">{{ $currentUser->name . " " . $currentUser->surname }}</h2>
                    <!--TODO: User status-->
                    <span class="profile-user-status">
                        @if($currentUser->online)
                            Online
                            @else
                            {{ $currentUser->last_login }}
                        @endif
                    </span>
                </div>
            </div>
            <div class="profile-user-additional">
                <!--TODO: Иконка дня рождения-->
                <div class="birthday">{{ $currentUser->calculate_age() }} {{ __('years old') }} ({{ $currentUser->birthday }})</div>
                <!--TODO: Иконка телефона-->
                <div class="phone">{{ $currentUser->phone_number }}</div>
                <!--TODO: Иконка Email-->
                <div class="email">{{ $currentUser->email }}</div>
                <!--TODO: Иконка скайпа-->
                {{--<div class="skype">{{ $currentUser->userInfo()->skype }}</div>--}}
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
            <div class="profile-user-menu-item">Activity</div>
            <div class="profile-user-menu-item">Events</div>
            <div class="profile-user-menu-item">Places</div>
            <div class="profile-user-menu-item">Photos</div>
            <div class="profile-user-menu-item">Achievements</div>
        </div>
        <div class="profile-user-content"></div>
    </section>
</main>
@endsection