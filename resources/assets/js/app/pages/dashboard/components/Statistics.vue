<template>
    <div class="columns">
        <div v-for="(statistic, key) in statistics" :key="key" class="column is-one-third">
            <div class="flex-card card-overflow light-bordered light-raised">
                <div class="icon-header">
                    <i class="material-icons primary">check_circle</i>
                </div>
                <div class="content">
                    <div class="card-title is-tile has-text-right">
                        {{ statistic }}
                        <div class="card-stat secondary has-text-right"><span class="stat-type">{{ key }}</span></div>
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
            ...mapGetters('statistics', ['statistics']),
            ...mapGetters('mode', ['mode']),
        },
        watch: {
            mode(newValue) {
                this.fetch();    
            }
        },
        methods: mapActions('statistics', ['fetch']),
        mounted() {
            this.fetch();
        }
    }
</script>
