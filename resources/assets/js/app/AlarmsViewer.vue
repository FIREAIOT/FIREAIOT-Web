<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card text-center" style="overflow: hidden;">
                    <div class="card-body" style="padding: 0px !important;">
                        <div class="row">
                            <div class="col-md-4" style="border-right: 1px solid #eaeaea; border-bottom: 1px solid #eaeaea;">
                                <br>
                                <ul class="nav nav-pills nav-pills-info justify-content-center">
                                    <li class="nav-item"><a class="nav-link active" href="#pill1" data-toggle="tab">Alarms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">UAVs</a></li>
                                </ul>
                                <br>
                            </div>
                            <div class="col-md-8 justify-content-center" style="border-bottom: 1px solid #eaeaea;">

                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0px !important;">
                        <div class="row">
                            <div class="col-sm-4" style="border-right: 1px solid #eaeaea;">
                                Alarms
                            </div>
                            <div class="col-sm-8" style="padding-left: 0px !important;">
                                <gmap-map :center="center" :zoom="7" ref="mmm" style="width: 100%; height: 500px">
                                    <gmap-marker :key="index" v-for="(m, index) in markers" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position"></gmap-marker>
                                </gmap-map>
                            </div>
                        </div>
                    </div>
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
