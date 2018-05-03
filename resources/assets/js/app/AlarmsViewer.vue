<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card text-center" style="overflow: hidden;">
                    <div class="card-body no-padding">
                        <div class="row">
                            <div class="col-md-4" id="tabs">
                                <br>
                                <ul class="nav nav-pills nav-pills-info justify-content-center">
                                    <li class="nav-item"><a class="nav-link active" href="#" data-toggle="tab">Alarms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">UAVs</a></li>
                                </ul>
                                <br>
                            </div>
                            <div class="col-md-8 justify-content-center" id="details">

                            </div>
                        </div>
                    </div>
                    <div class="card-body no-padding">
                        <div class="row" style="height: 500px; overflow: hidden;">
                            <div class="col-sm-4" id="cards">
                                <div class="card no-margin" style="border-left: 20px solid red; border-radius: 0px">
                                    <div class="card-body">
                                        <div class="stats">
                                            <i class="material-icons">access_time</i> Updated 2 minutes ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 no-padding-left">
                                <gmap-map :center="center" :zoom="7" ref="mmm" id="map">
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
            key: 'AIzaSyDiF33NhMowopn9uwf2SFuUaB8eL8_k_Po', //The api key is restricted don't play dude :D
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


<style>
    .no-padding {
        padding: 0px !important;
    }

    .no-padding-left {
        padding-left: 0px !important;
    }

    #tabs {
        border-right: 1px solid #eaeaea;
        border-bottom: 1px solid #eaeaea;
    }

    #details {
        border-bottom: 1px solid #eaeaea;
    }

    #map {
        width: 100%; height: 500px;
        margin: 0px;
    }

    #cards {
        border-right: 1px solid #eaeaea; height: 100%; overflow-y: scroll; padding: 0px !important;
    }
</style>