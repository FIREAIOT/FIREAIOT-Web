<template>
    <div>
        <!-- Wrapper -->
        <div class="login-wrapper columns is-gapless">
            <!-- Form section -->
            <div class="column is-4">
                <div class="hero is-fullheight">
                    <!-- Header -->
                    <div class="hero-heading">
                        <div class="section intro-section has-text-centered no-padding-bottom animated preFadeInLeft fadeInLeft">
                            <router-link :to="{ name: 'home' }">
                                <img class="top-logo" src="/images/logo.png" alt="FIREAIOT logo">
                            </router-link>
                            <div id="signup-intro" class="intro-text">
                                <div class="intro-title">FIREAIOT</div>
                                <div class="intro-sub">Join your community now!</div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Body -->
                    <div class="hero-body">
                        <div class="container">
                            <div class="columns">
                                <div class="column is-10 is-offset-1">
                                    <!-- Login form -->
                                    <form v-if="isLogin" @submit.prevent="submitLogin">
                                        <div class="login-form animated preFadeInLeft fadeInLeft">
                                            <div class="field pb-10">
                                                <div class="control has-icons-right">
                                                    <input class="input is-large" type="email" placeholder="Email address" required autocomplete="false" v-model="loginForm.email">
                                                    <span class="icon is-medium is-right">
                                                <i class="im im-icon-Envelope"></i>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="field pb-10">
                                                <div class="control has-icons-right">
                                                    <input class="input is-large" type="password" placeholder="Password" required autocomplete="false" v-model="loginForm.password">
                                                    <span class="icon is-medium is-right">
                                                <i class="im im-icon-Key-2"></i>
                                            </span>
                                                </div>
                                            </div>
                                            <p class="control login">
                                                <button type="submit" class="button button-cta secondary-btn btn-outlined is-fullwidth raised no-lh" :class="{'is-loading': isLoading}">Login</button>
                                            </p>
                                        </div>
                                    </form>
                                    <!-- Login form -->

                                    <!-- Register form -->
                                    <form v-if="isRegister" @submit.prevent="submitRegister">
                                        <div class="login-form animated preFadeInLeft fadeInLeft">
                                            <div class="field pb-10">
                                                <div class="control has-icons-right">
                                                    <input class="input is-large" type="text" placeholder="Full name" required v-model="registerForm.name">
                                                    <span class="icon is-medium is-right">
                                                <i class="im im-icon-ID-2"></i>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="field pb-10">
                                                <div class="control has-icons-right">
                                                    <input class="input is-large" type="text" placeholder="Username" required v-model="registerForm.username">
                                                    <span class="icon is-medium is-right">
                                                <i class="im im-icon-User"></i>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="field pb-10">
                                                <div class="control has-icons-right">
                                                    <input class="input is-large" type="email" placeholder="Email address" required v-model="registerForm.email">
                                                    <span class="icon is-medium is-right">
                                                <i class="im im-icon-Envelope"></i>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="field pb-10">
                                                <div class="control has-icons-right">
                                                    <input class="input is-large" type="password" placeholder="Password" required v-model="registerForm.password">
                                                    <span class="icon is-medium is-right">
                                                <i class="im im-icon-Key-2"></i>
                                            </span>
                                                </div>
                                            </div>
                                            <p class="control login">
                                                <button type="submit" class="button button-cta secondary-btn btn-outlined is-fullwidth raised no-lh" :class="{'is-loading': isLoading}">Register</button>
                                            </p>
                                        </div>
                                    </form>
                                    <!-- /Register form -->
                                    
                                    <!-- Toggles-->
                                    <div v-if="isLogin" @click="toggleAction" class="section forgot-password animated preFadeInLeft fadeInLeft no-padding-top">
                                        <p class="has-text-centered">
                                            <a href="#">Don't have an account? Sign Up!</a>
                                        </p>
                                        <p class="has-text-centered">
                                             <router-link :to="{ name: 'passwordRequest' }" class="has-text-centered">Forget Password?!</router-link>
                                        </p>
                                    </div>
                                
                                    <div v-if="isRegister" @click="toggleAction" class="section forgot-password animated preFadeInLeft fadeInLeft no-padding-top">
                                        <p class="has-text-centered">
                                            <a href="#">Have an account? Login!</a>
                                        </p>
                                    </div>
                                    <!-- /Toggles-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Form section -->
        </div>
        <!-- /Wrapper-->
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';

    export default {
        data() {
            return {
                action: 'login',
                isLoading: false,
                loginForm: new Form({
                    email: '',
                    password: ''
                }),
                registerForm: new Form({
                    name: '',
                    email: '',
                    password: '',
                    username: ''
                })
            }
        },
        computed: {
            ...mapGetters('auth', ['user']),
            isRegister() {
                return this.action === 'register';
            },
            isLogin() {
                return this.action === 'login';
            }
        },
        methods: {
            ...mapActions('auth', ['login', 'register']),
            toggleAction() {
                if(this.action === 'login'){
                    return this.action = 'register'
                }
                
                return this.action = 'login'
            },
            submitLogin() {
                this.isLoading = true;

                this.login({
                    form: this.loginForm
                }).then(() => {
                    this.isLoading = false;
                    this.showLoginSuccessMessage();
                    // if the url query exists => redirect to it
                    if(this.$route.query.redirect) {
                        this.redirectToQueryUrl()
                    }else {
                        this.redirectToDashboard()
                    }
                }).catch(() => {
                    this.loginForm.password = '';
                    this.showLoginErrorMessage();
                    this.isLoading = false;
                });
            },
            submitRegister() {
                this.isLoading = true;

                this.register({
                    form: this.registerForm
                }).then(() => {
                    this.isLoading = false;
                    this.loginForm.email = this.registerForm.email;
                    this.loginForm.password = this.registerForm.password;
                    this.submitLogin();
                }).catch(() => {
                    this.registerForm.password = '';
                    this.showRegisterErrorMessage();
                    this.isLoading = false;
                });
            },
            showLoginErrorMessage() {
                this.$toast.error('Opps!', 'Something went wrong, please check your email and password!', {
                    position: 'topRight',
                    titleColor: '#fff',
                    messageColor: '#fff',
                    backgroundColor: '#FF7273',
                    progressBarColor: '#444F60',
                });
            },
            showRegisterErrorMessage() {
                this.$toast.error('Opps!', 'Something went wrong, please check your details!', {
                    position: 'topRight',
                    titleColor: '#fff',
                    messageColor: '#fff',
                    backgroundColor: '#FF7273',
                    progressBarColor: '#444F60',
                });
            },
            showLoginSuccessMessage() {
                this.$toast.success('Success!', 'Welcome back! ' + this.user.name, {
                    position: 'bottomRight',
                    titleColor: '#fff',
                    messageColor: '#fff',
                    backgroundColor: '#3FAB81',
                    progressBarColor: '#444F60',
                });
            },
            redirectToDashboard() {
                if(this.user.hasNotCompletedProfile) {
                    return this.$router.replace({ name: 'completeProfile' })
                }
                
                this.$router.replace({ name: 'dashboard'});
            },
            redirectToQueryUrl() {
                if(this.user.hasNotCompletedProfile) {
                    return this.$router.replace({ name: 'completeProfile', query: { redirect: this.$route.query.redirect } })
                }

                this.$router.replace(this.$route.query.redirect);
            }
        },
    }
</script>