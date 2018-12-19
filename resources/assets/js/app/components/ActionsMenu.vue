<template>
    <div class="button button-cta btn-align btn-outlined rounded is-drop is-bold is-centered">{{ user.name }}
        <div class="dropContain">
            <div class="dropOut is-primary">
                <div class="triangle"></div>
                <ul>
                    <router-link tag="li" :to="{ name: 'dashboard' }"><i class="drop-icon sl sl-icon-speedometer"></i> Dashboard</router-link>
                    <li @click="submitLogout" class="destructive" :class="{'button is-loading': isLoading}"><i class="drop-icon sl sl-icon-power"></i> Logout</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';
    
    export default {    
        data() {
            return {
                isLoading: false,
            }
        },
        computed: mapGetters('auth', ['user']),
        methods: {
            ...mapActions('auth', ['logout']),
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
