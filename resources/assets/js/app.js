require('./bootstrap');

window.Vue = require('vue');

import accordion from './app/Accordion.vue'

const app = new Vue({
    el: '#app',
    components: {
        accordion
    }
});
