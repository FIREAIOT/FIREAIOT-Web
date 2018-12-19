<template>
    <div class="columns">
        <div class="column">
            <div class="flex-card card-overflow light-bordered light-raised">
                <div class="icon-header">
                    <i class="material-icons primary">check_circle</i>
                </div>
                <div class="content">
                    <div class="card-title is-tile has-text-right">
                        UAVs
                        <div class="card-stat secondary has-text-right"><span class="stat-type">{{ uavs.length }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'; 

    export default {
        computed: {
            ...mapGetters('uavs', ['uavs']),
        },
        methods: mapActions('uavs', ['fetch']),
        mounted() {
            this.fetch();
        }
    }
</script>
