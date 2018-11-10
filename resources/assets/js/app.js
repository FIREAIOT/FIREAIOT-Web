require('./bootstrap');

import Vue from 'vue';
import App from "./App.vue";
import store from './store';
import router from "./router";
import localforage from 'localforage';
import VueIziToast from 'vue-izitoast';

Vue.use(VueIziToast);

localforage.config({
    driver: localforage.LOCALSTORAGE,
    storeName: "FIREAIOT"
});

store.dispatch('auth/checkTokenExists').then((token) => {
    store.dispatch('auth/fetchUser')
        .catch(() => {
            store.dispatch('auth/clearAuth');
            router.replace({ name: 'home' });
    });
}).catch(() => store.dispatch('auth/clearAuth'));

Vue.component('loader', require('./app/components/Loader.vue'));
Vue.component('avatar', require('./app/components/Avatar.vue'));

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store
});