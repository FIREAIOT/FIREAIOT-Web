<template>
    <div class="navbar-placeholder" style="min-height: 70px">
        <nav class="navbar navbar-wrapper navbar-default navbar-fade is-transparent" :class="{'navbar-light' : isLight}">
            <div class="container">
                <!-- Brand -->
                <div class="navbar-brand">
                    <router-link v-if="isLight" :to="{ name: 'home' }" class="navbar-item" exact>
                        <img src="/images/logo.png" height="40px" alt="FIREAIOT logo"> FIREAIOT
                    </router-link>
                    <router-link v-else :to="{ name: 'home' }" class="navbar-item" exact>
                        <img src="/images/logo.png" height="40px" alt="FIREAIOT logo"> FIREAIOT
                    </router-link>

                    <div class="custom-burger" data-target="">
                        <a id="navmenu" class="responsive-btn" href="javascript:void(0);">
                            <span class="menu-toggle">	
                                <span class="icon-box-toggle"> 	
                                    <span class="rotate">
                                        <i class="icon-line-top"></i>
                                        <i class="icon-line-center"></i>
                                        <i class="icon-line-bottom"></i> 
                                    </span>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- /Brand -->
            
                <!-- Navbar menu -->
                <div class="navbar-menu">
                    <!-- Navbar Start -->
                    <div class="navbar-start">
                        <router-link v-if="! check" :to="{ name: 'how' }" class="navbar-item is-slide">How it works</router-link>
                        <router-link v-if="! check" :to="{ name: 'how' }" class="navbar-item is-slide">Host your drone</router-link>
                    </div>
                    <!-- /Navbar Start -->
                
                    <!-- Navbar end -->
                    <div class="navbar-end">
                        <!-- Login button -->
                        <div v-if="! check" class="navbar-item">
                            <router-link :to="{ name: 'login' }" class="button btn-outlined button-cta is-bold btn-align rounded raised" :class="[isLight ? 'light-btn' : 'primary-btn']">Get Started</router-link>
                        </div>
                        <!-- /Login button -->

                        <!-- Quick actions menu -->
                        <div v-if="check" class="navbar-item" >
                            <actions-menu :class="[isLight ? 'light-btn' : 'primary-btn']"></actions-menu>
                        </div>
                        <!-- /Quick actions menu -->
                    </div>
                    <!-- /Navbar end -->
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    import ActionsMenu from './ActionsMenu';
    import { isEqual, throttle } from 'lodash';
    import { mapGetters, mapActions } from 'vuex';

    export default {
        props: ['theme'],
        data() {
            return {
                forceDarkTheme: false,
            }
        },
        computed: {
            ...mapGetters('auth', ['check', 'user']),
            isLight() {
                return isEqual(this.theme, "light") && ! this.forceDarkTheme;
            }
        },
        mounted() {
            let v = this;
            window.addEventListener(
                'scroll',
                throttle(function()  {
                    if(window.scrollY > 65) {
                        v.forceDarkTheme = true;
                        $(".navbar-wrapper.navbar-fade.is-transparent").removeClass('is-transparent').addClass('navbar-faded');
                    } else{
                        v.forceDarkTheme = false;
                        $(".navbar-wrapper").removeClass('navbar-faded').addClass('is-transparent');
                    }
                }, 100)
            );

            if ($('.custom-burger').length) {
                $('.custom-burger').on("click", function(){
                    $(this).toggleClass('is-active');
                    $("#navmenu").toggleClass('is-active');
                    $(".navbar-menu").toggleClass('is-active');
                    $('.navbar.is-light').toggleClass('is-dark-mobile')
                });
            }
        },
        components: {
            ActionsMenu,
        }
    }
</script>