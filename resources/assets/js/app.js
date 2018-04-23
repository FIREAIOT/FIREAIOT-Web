require('./bootstrap');

window.Vue = require('vue');

import accordion from './app/Accordion.vue'
import timeline from './app/Timeline.vue'

const app = new Vue({
    el: '#app',
    components: {
        accordion,
        timeline
        // notifyMe,
        // contactUs,
        // newProject,
        // workshopRegistration
    }
});
