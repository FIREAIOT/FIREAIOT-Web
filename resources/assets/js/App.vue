<template>
    <div id="app">
        <placeholder></placeholder>
        <router-view></router-view>
        <div id="backtotop"><a href="#"></a></div>
    </div>
</template>

<script>
    import placeholder from './app/components/placeholder';
    
    export default {
        components: {
            placeholder
        },
        mounted() {
            var pxShow = 300;
            var scrollSpeed = 500;
            $(window).on('scroll', function() {
                if ($(window).scrollTop() >= pxShow) {
                    $("#backtotop").addClass('visible');
                } else {
                    $("#backtotop").removeClass('visible');
                }
            });
            $('#backtotop a').on('click', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, scrollSpeed);
                return false;
            });
        }
    }
</script>