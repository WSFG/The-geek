@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="panel">
                <div class="panel-heading">
                    Список друзей
                </div>
                @forelse ($friends as $friend)
                    <a href="{{ route('chat.show', $friend->id) }}" class="panel-block" style="justify-content: space-between;">
                        <div class="message-user">
                            <div class="message-user-image">
                                <img src="{{ url($friend->getMainImage()->path) }}" alt="{{ $friend->name . ' ' . $friend->surname }}">
                            </div>
                            {{ $friend->name . ' ' . $friend->surname }}
                        </div>
                        <onlineuser v-bind:friend="{{ $friend }}" v-bind:onlineusers="onlineUsers"></onlineuser>
                    </a>
                @empty
                    <div class="panel-block">
                        У вас нет друзей
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
