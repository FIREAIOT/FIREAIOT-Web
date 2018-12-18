window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Content-Type'] = 'application/json';

import Form from './core/Form';
window.Form = Form;

require('smoothscroll-for-websites');
require('waypoints/lib/jquery.waypoints');
require('jquery.counterup');