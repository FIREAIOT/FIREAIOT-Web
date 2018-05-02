require('./bootstrap');

window.Vue = require('vue');

import alarmsViewer from './app/AlarmsViewer.vue'

const app = new Vue({
    el: '#app',
    components: {
        alarmsViewer
    }
});
