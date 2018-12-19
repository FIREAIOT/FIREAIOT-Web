<template>
    <div>
        <!-- Loader -->
        <loader class="column is-4 is-offset-4 mb-50 mt-50" :active="isLoading"></loader>
        <!-- /Loader -->

        <div class="tasks-wrapper mt-5" v-if="! isLoading && uavs">
            <uav v-for="uav in uavs" 
                    :key="uav.id" 
                    :data="uav"></uav>
        </div>

        <div class="tasks-wrapper" v-if="! isLoading && ! uavs.length">
            <jumper class="mt-20" size="100"></jumper>
            <h4 class="is-size-4 has-text-centered">No UAV found!</h4>
        </div>
    </div>
</template>

<script>
    import Uav from './Uav';
    import { Jumper } from 'vue-loading-spinner'
    import { mapGetters, mapActions, mapMutations } from "vuex"

    export default {
        name: 'Uavs',
        computed: {
            ...mapGetters('uavs', ['uavs']),
            ...mapGetters('loading', ['isLoading'])
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
