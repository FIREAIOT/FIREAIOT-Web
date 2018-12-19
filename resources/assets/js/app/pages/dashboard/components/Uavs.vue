<template>
    <div>
        <div class="has-text-right mb-20">
            <router-link v-if="isStudentMode" tag="a" :to="{ name: 'courses' }" class="button rounded primary-btn btn-outlined">
                <i class="im im-icon-Add"></i> Request New Session
            </router-link>

            <router-link v-if="isTutorMode" tag="a" :to="{ name: 'newOffer' }" class="button rounded primary-btn btn-outlined">
                <i class="im im-icon-Add"></i> Post New Offer
            </router-link>
        </div>
        <!-- Loader -->
        <loader class="column is-4 is-offset-4 mb-50 mt-50" :active="isLoading"></loader>
        <!-- /Loader -->

        <div class="tasks-wrapper mt-5" v-if="! isLoading && sessions">
            <uav v-for="session in sessions" 
                    :key="session.id" 
                    @click.native="showSession(session)" 
                    :data="session"></uav>
        </div>

        <div class="tasks-wrapper" v-if="! isLoading && ! sessions.length">
            <jumper class="mt-20" size="100"></jumper>
            <h4 class="is-size-4 has-text-centered">No session found!</h4>
        </div>
    </div>
</template>

<script>
    import Uav from './Uav';
    import { Jumper } from 'vue-loading-spinner'
    import { mapGetters, mapActions, mapMutations } from "vuex"

    export default {
        name: 'Sessions',
        computed: {
            ...mapGetters('sessions', ['sessions']),
            ...mapGetters('mode', ['isStudentMode', 'isTutorMode']),
            ...mapGetters('loading', ['isLoading'])
        },
        methods: {
            showSession(session) {
                this.$router.push({ name: 'session' , params: { session: session.id }})
            }
        },
        components: {
            Uav,
            Jumper
        }
    }
</script>

<style lang="scss" scoped>
.tasks-wrapper {
    background: transparent;
    padding: 0px;
    border: none;
}
.spinner {
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    * {
        line-height: 0;
        box-sizing: border-box;
    }
}
.spinner--jumper {
    padding: 50px
}
</style>
