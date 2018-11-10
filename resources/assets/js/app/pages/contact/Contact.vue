<template>
    <div>
        <!-- Hero -->
        <div class="hero is-small is-feature-grey">
            <nav-bar></nav-bar>
            <!-- Hero caption -->
            <div class="hero-body pt-50">
                <div class="container">
                    <h1 class="parallax-hero-title dark-text">
                        Contact Us
                    </h1>
                    <h2>
                        Please fill in the needed information.
                    </h2>

                    <larecipe-progress :animated="true" :striped="true" :value="progress"></larecipe-progress>
                    
                    <div v-if="step1">
                        <h1 class="is-size-2 dark-text animated fadeInRight">
                            Your full name?
                        </h1>
                        <div class="columns mt-20 mb-20 animated fadeInRight">
                            <div class="column is-12 field pb-10">
                                <div class="control has-icons-right">
                                    <input class="input is-large rounded" type="text" v-model="name" required autocomplete="false">
                                </div>
                            </div>
                        </div>

                        <a class="button rounded button-cta raised is-bold animated fadeInDown pull-right" :class="canGoToNextStep ? 'primary-btn ' : 'is-disabled' " @click="currentStep++">
                            Next
                        </a>
                    </div>

                    <div v-if="step2">
                        <h1 class="is-size-2 dark-text animated fadeInRight">
                            Your email address?
                        </h1>
                        <div class="columns mt-20 mb-20 animated fadeInRight">
                            <div class="column is-12 field pb-10">
                                <div class="control has-icons-right">
                                    <input class="input is-large rounded" type="text" v-model="email" required autocomplete="false">
                                </div>
                            </div>
                        </div>

                        <a class="button rounded button-cta raised is-bold animated fadeInDown pull-right" :class="canGoToNextStep ? 'primary-btn ' : 'is-disabled' " @click=" currentStep++">
                            <i class="fa fa-arrow-right"></i> Next
                        </a>
                        <a class="button rounded button-cta raised is-bold animated fadeInDown mr-10 pull-right" @click="currentStep--">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>

                    <div v-if="step3">
                        <h1 class="is-size-2 dark-text animated fadeInRight">
                            Your Message?
                        </h1>
                        <div class="columns mt-20 mb-20 animated fadeInRight">
                            <div class="column is-12 field pb-10">
                                <div class="control has-icons-right">
                                    <textarea class="textarea" v-model="message" required cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <a class="button rounded button-cta raised is-bold animated fadeInDown pull-right" :class="canGoToNextStep ? 'primary-btn ' : 'is-disabled' " @click="submit">
                            <i class="fa fa-send"></i> Submit
                        </a>
                        <a class="button rounded button-cta raised is-bold animated fadeInDown mr-10 pull-right" @click="currentStep--">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>

                    <div v-if="submited" class="mb-20">
                        <h2 class="is-size-2 color-primary dark-text animated fadeInRight">
                            Thank you!
                        </h2>

                        <h5 class="is-size-5 color-primary dark-text animated fadeInRight">
                            We recieved your message, our team will reach you out very soon.
                        </h5>
                        
                    </div>
                </div>
            </div>
            <!-- /Hero caption -->
        </div>
        <!-- /Hero -->

        <shared-footer></shared-footer>
    </div>
</template>

<script>
    import { isEmpty } from 'lodash' 
    import { mapGetters } from 'vuex' 
    import navBar from '../../components/NavBar' 
    import sharedFooter from '../../components/SharedFooter' 
    import LarecipeProgress from '../../components/LarecipeProgress'

    export default {
        data() {
            return {
                name: '',
                email: '',
                message: '',
                submited: false,
                currentStep: 1
            }
        },
        computed: {
            ...mapGetters('auth', ['user']),
            progress() {
                if(this.currentStep == 1) { return 10 }
                if(this.currentStep == 2) { return 50 }
                if(this.submited) { return 100 }
                if(this.currentStep == 3) { return 90 } 
            },
            step1() {
                return this.currentStep == 1
            },
            step2() {
                return this.currentStep == 2
            },
            step3() {
                return this.currentStep == 3
            },
            canGoToNextStep() {
                if(this.currentStep == 1 && ! isEmpty(this.name)) { return true }
                if(this.currentStep == 2 && ! isEmpty(this.email)) { return true }
                if(this.currentStep == 3 && ! isEmpty(this.message)) { return true }

                return false
            }
        },
        methods: {
            submit() {
                const loadingComponent = this.$loading.open({ container: null })

                axios.post('/api/contact', { 
                    name: this.name,
                    email: this.email,
                    message: this.message,
                })
                .then(response => { 
                    this.submited = true 
                    loadingComponent.close()
                })
                .catch(() => loadingComponent.close())
            }, 
            updateInfoFromCurrentUser() {
                this.name = this.user ? this.user.name : ''
                this.email = this.user ? this.user.email : ''
            }
        },
        watch: {
            user(newValue) {
                this.updateInfoFromCurrentUser()
            },
            submited(newValue) {
                this.name = ''
                this.email = ''
                this.message = ''
                this.currentStep++
            }
        },
        mounted() {
            this.updateInfoFromCurrentUser()
        },
        components: {
            navBar,
            sharedFooter,
            LarecipeProgress,
        }
    }
</script>

<style>
.dark-text {
    color: #444F60 !important;
}

.parallax-hero-title {
    font-size: 2.5rem !important;
    font-family: 'Nexa Bold', cursive !important;
}

.flex-card.is-active {
    box-shadow: inset rgba(143,160,241,0.2) 0 0 0 1px, rgba(213,220,247,0.59) 0 10px 20px;
    border: 2px solid #3FAB81;
}
</style>
