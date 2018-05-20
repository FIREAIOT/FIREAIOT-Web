require('./bootstrap');
import Snotify from 'vue-snotify';

window.Vue = require('vue');

Vue.use(Snotify);

import dashboard from './app/Dashboard.vue'

const app = new Vue({
    el: '#app',
    components: {
        dashboard
    }
});
