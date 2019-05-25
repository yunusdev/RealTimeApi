/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-chat', require('./components/Chat.vue').default);
Vue.component('app-messages', require('./components/Messages.vue').default);
Vue.component('app-talk', require('./components/Talk.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Echo from "laravel-echo"

const app = new Vue({

    el: '#app',


    data: {
        messages: [],

    },

    created() {
        this.fetchMessages();

        window.Echo.private('chat')
            .listen('MessageSent', (e) => {
                // this.messages.push({
                //     message: e.message.message,
                //     user: e.user
                // });

                console.log('here')
            });
    },


    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(data) {

            console.log(data);
            this.messages.push(data);
            //
            axios.post('/messages', {message: data.message, talk_id: data.talk_id}).then(response => {
                console.log(response.data);
            }).catch(error => {
                console.log(error)
            })
        }
    }
});
