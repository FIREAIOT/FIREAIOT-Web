let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .extract(['vue', 'buefy', 'vuex', 'vue-router'])
   .mix.browserSync('fireaiot.localhost')
   .disableNotifications();

if (mix.inProduction()) {
    mix.version();
}