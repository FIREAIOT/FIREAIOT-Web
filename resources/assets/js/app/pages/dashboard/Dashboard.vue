<template>
    <div>
        <!-- Hero -->
        <div class="hero is-feature-grey">
            <nav-bar></nav-bar>
            <div class="hero-body is-relative">
                <div v-if="check" class="container">
                    <div class="columns">
                        <div class="column is-one-third" sticky-container>
                            <profile class="animated preFadeInUp fadeInUp"></profile>
                            <div class="animated preFadeInUp fadeInUp" v-sticky sticky-offset="offset" sticky-side="top">
                                <side-bar></side-bar>
                            </div>
                        </div>

                        <div class="column is-two-thirds animated preFadeInUp fadeInUp delay-0 pt-30">
                            <statistics></statistics>
                            <sessions></sessions>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Hero -->

        <!-- Footer -->
        <shared-footer></shared-footer>
        <!-- /Footer -->
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import Sticky from 'vue-sticky-directive'
    import Profile from './components/Profile'
    import SideBar from './components/SideBar'
    import navBar from '../../components/NavBar'
    import Sessions from './components/Sessions'
    import Statistics from './components/Statistics'
    import sharedFooter from '../../components/SharedFooter'

    export default {
        data() {
            return {
                offset: {top: 100, bottom: 0},
            }
        },
        computed: {
            ...mapGetters('auth', ['check']),
            ...mapGetters('mode', ['mode']),
        },
        components: {
            navBar,
            sharedFooter,
            Statistics,
            Sessions,
            Profile,
            SideBar
        },
        directives: {
            Sticky
        }
    }
</script>