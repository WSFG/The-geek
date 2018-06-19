
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import EchoLibrary from "laravel-echo"

window.Echo = new EchoLibrary({
    broadcaster: 'pusher',
    key: '4ad983370ea8dee70072'
});

Echo.private('chat-room.1')
    .listen('ChatMessageWasReceived', (e) => {
        console.log(e.user, e.chatMessage);
    });