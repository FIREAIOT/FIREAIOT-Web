<template>
     <!-- Hero -->
    <div class="hero hero-wavy is-fullheight is-feature-grey">
        <nav-bar></nav-bar>
        <div class="hero-body is-relative no-padding-bottom">
            <div class="container">
                <div class="columns is-two">
                    <div class="column">
                        <h1 class="title big-title">Convert Your Drone To A Real Firefighter</h1>
                        <div class="subtitle light-subtitle">Help your community extinguish fires with your drone when you don't use it!</div>
                        <router-link :to="{ name: 'dashboard' }" class="button button-cta primary-btn raised ">
                            Host your drone
                        </router-link>
                        <a class="button button-cta btn-outlined primary-btn raised  js-modal-btn" data-video-id="1VxGbT8hTBc"><i class="fa fa-play"></i> Watch a Video</a>
                    </div>
                    <div class="column">
                        <div class="is-fullwidth">
                            <img src="/images/drone.svg" style="z-index: 1; position: relative;" alt="fireaiot">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Hero -->
</template>

<script>
    import ModalVideo from 'modal-video';
    import NavBar from '../../../components/NavBar';

    export default {
        mounted() {
            new ModalVideo('.js-modal-btn', { youtube: {controls: false} })
        },
        components: {
            NavBar
        }
    }
</script>

<style scoped>
    .big-title {
        font-family: 'Nexa Bold', sans-serif;
        margin-bottom: 0 !important;
        padding: 10px 0;
        font-size: 3rem !important;
    }

    .light-subtitle {
      font-size: 1.5rem;
      padding: 2% 0% 2% 0%;
      margin: 0px 0 10px 0 !important;
    }

    .hero.hero-wavy:before {
        background: transparent url(/images/wavy-alt.png) no-repeat scroll 0 bottom/100% auto;
        content: "";
        height: 321px;
        width: 100%;
        z-index: 0 !important;
        position: absolute;
        bottom: -1px;
        left: 0;
    }
</style>