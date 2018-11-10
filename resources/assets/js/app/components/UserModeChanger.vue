<template>
    <div class="button mode-btn rounded is-drop is-bold is-centered" id="userModeChanger">
        <span v-if="isStudentMode">Student Mode</span>
        <span v-if="isTutorMode">Tutor Mode</span>
        <div class="dropContain">
            <div class="dropOut is-primary">
                <div class="triangle"></div>
                <ul>
                    <li v-if="isTutorMode" @click="setStudentMode">Change to Student Mode</li>
                    <li v-if="isStudentMode" @click="setTutorMode">Change to Tutor Mode</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions, mapMutations } from 'vuex';
    
    export default {    
        data() {
            return {
                isLoading: false,
            }
        },
        computed: {
            ...mapGetters('auth', ['user']),
            ...mapGetters('mode', ['isStudentMode', 'isTutorMode']),
        },
        methods: {
            ...mapActions('auth', ['logout']),
            ...mapMutations('mode', ['setStudentMode', 'setTutorMode']),
            submitLogout() {
                this.isLoading = true;
                this.logout()
                    .then(() => {
                        this.showLogoutInfoMessage();
                        this.$router.replace({ name: 'home'});
                        this.isLoading = false;
                    }).catch(() => this.isLoading = false);
            },
            showLogoutInfoMessage() {
                this.$toast.info('See You!', 'Logged out successfully.', {
                    position: 'bottomRight',
                    titleColor: '#fff',
                    messageColor: '#fff',
                    backgroundColor: '#00a8ff',
                    progressBarColor: '#444F60',
                });
            }
        },
    }
</script>

<style>
.mode-btn {
    background: transparent !important;
    border: none;
    color: #44aa82;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#userModeChanger.is-light {
    color: #fff;
}
</style>
