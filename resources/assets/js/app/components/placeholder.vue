<template>
    <div>
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
    </div>
</template>

<script>
    export default {
        name: "placeholder",
        mounted() {
            if ($('.pageloader').length) {

                $('.pageloader').toggleClass('is-active');

                $(window).on('load', function() {
                    var pageloaderTimeout = setTimeout( function() {
                        $('.pageloader').toggleClass('is-active');
                        $('.infraloader').toggleClass('is-active');
                        clearTimeout( pageloaderTimeout );
                    }, 700 );
                })
            }
        }
    }
</script>