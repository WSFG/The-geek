
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat', require('./components/Chat.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));
Vue.component('onlineuser', require('./components/OnlineUser.vue'));

const app = new Vue({
    el: '#app',
    data: {
        chats: '',
        onlineUsers: ''
    },
    created() {
        const userId = $('meta[name="userId"]').attr('content');
        const friendId = $('meta[name="friendId"]').attr('content');

        if (friendId != undefined) {
            axios.post('/chat/getChat/' + friendId).then((response) => {
                this.chats = response.data;
            });

            Echo.private('Chat.' + userId + '.' + friendId)
                .listen('ChatMessageWasReceived', (e) => {
                    document.getElementById('ChatAudio').play();
                    this.chats.push(e.data);
                });

            if (userId != 'null') {
                Echo.join('Online')
                    .here((users) => {
                        this.onlineUsers = users;
                    })
                    .joining((user) => {
                        this.onlineUsers.push(user);
                    })
                    .leaving((user) => {
                        this.onlineUsers = this.onlineUsers.filter((u) => {u != user});
                    });
            }
        }
    }
});