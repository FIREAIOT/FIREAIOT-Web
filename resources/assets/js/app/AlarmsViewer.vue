<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">AlarmsViewer</div>

                    <div class="card-body">
                        Fire location: {{ longitude }}, {{ latitude }}
                    </div>

                    <gmap-map :center="center" :zoom="7" ref="mmm" style="width: 100%; height: 500px">
                        <gmap-marker :key="index" v-for="(m, index) in markers" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position"></gmap-marker>
                    </gmap-map>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import * as VueGoogleMaps from 'vue2-google-maps';

    Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyDiF33NhMowopn9uwf2SFuUaB8eL8_k_Po',
            libraries: 'drawing'
        },
    });

    export default {
        data() {
            return {
                longitude: "",
                latitude: "",
                center: {
                    lat: 10.0,
                    lng: 10.0
                },
                markers: [{
                    position: {
                        lat: 10.0,
                        lng: 10.0
                    }
                }, {
                    position: {
                        lat: 11.0,
                        lng: 11.0
                    }
                }]
            }
        },
        mounted() {
            Echo.channel('alarms')
                .listen('AlarmReceived', (e) => {
                    this.longitude = e.longitude;
                    this.latitude = e.latitude;
                });
        }
    }
</script>
