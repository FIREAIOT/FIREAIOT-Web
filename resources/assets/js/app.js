require('./bootstrap');

window.Vue = require('vue');

import dashboard from './app/Dashboard.vue'

const app = new Vue({
    el: '#app',
    components: {
        dashboard
    }
});
