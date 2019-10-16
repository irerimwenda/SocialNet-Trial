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

Vue.component('init-component', require('./components/Init.vue').default);
Vue.component('friend-component', require('./components/Friend.vue').default);
Vue.component('notification-component', require('./components/Notifications.vue').default);
Vue.component('unread-notification-component', require('./components/UnreadNotifications.vue').default);
Vue.component('post-component', require('./components/Post.vue').default);
Vue.component('feed-component', require('./components/Feed.vue').default);

import { store } from './store'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
