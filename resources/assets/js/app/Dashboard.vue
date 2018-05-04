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
                                    <li class="nav-item"><a class="nav-link active" href="#" @click="openedTab = 'Alarms'" data-toggle="tab">Alarms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" @click="openedTab = 'UAVs'" data-toggle="tab">UAVs</a></li>
                                </ul>
                                <br>
                            </div>
                            <div class="col-md-8 justify-content-center" id="details">
                                <br>
                                <p>New Alarm</p>
                                Longitude: {{ longitude }}, Latitude: {{ latitude }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body no-padding">
                        <div class="row" style="height: 500px; overflow: hidden;">
                            <div class="col-sm-4" id="cards">
                                <div class="card no-margin card-alarm" v-if="openedTab == 'Alarms'" v-for="alarm in alarms" :class="[{'card-alarm-selected' : selectedAlarm == alarm}, alarm.status]" @click="selectedAlarm = alarm">
                                    <div class="card-body text-left">
                                        <p><b>Latitude:</b> {{ alarm.latitude }}</p>
                                        <p><b>Longitude:</b> {{ alarm.longitude }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">access_time</i> {{ alarm.createdAt }}
                                        </div>
                                    </div>
                                </div>

                                <div class="card no-margin card-alarm completed" v-if="openedTab == 'UAVs'" v-for="uav in uavs">
                                    <div class="card-body text-left">
                                        <p><b>Latitude:</b> {{ uav.latitude }}</p>
                                        <p><b>Longitude:</b> {{ uav.longitude }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">access_time</i> {{ uav.createdAt }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 no-padding-left">
                                <gmap-map :center="selectedAlarm != null ? position(selectedAlarm) : defaultLocation" :zoom="13" ref="mmm" id="map">
                                    <gmap-marker :key="index" v-for="(alarm, index) in alarms" :position="position(alarm)"></gmap-marker>
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
                longitude       : "",
                latitude        : "",
                selectedAlarm   : {},
                defaultLocation : {
                    lat : 0,
                    lng : 0
                },
                alarms    : [],
                uavs      : [],
                openedTab : "Alarms"
            }
        },
        mounted() {
            Echo.channel('alarms')
                .listen('AlarmReceived', (e) => {
                    this.longitude = e.longitude;
                    this.latitude = e.latitude;
                });

            axios.get("/alarms").then((response) => {
                this.alarms = response.data.data;
                this.selectedAlarm = response.data.data[0];
            });

            axios.get("/uavs").then((response) => {
                this.uavs = response.data.data;
            });
        },
        methods: {
            position(alarm) {
                return {
                    lat: alarm.latitude,
                    lng: alarm.longitude
                }
            }
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
        border-right: 1px solid #eaeaea;
        height: 100%;
        overflow-y: scroll;
        padding: 0px !important;
    }

    .card-alarm {
        border-radius: 0px;
        cursor: pointer;
        margin-bottom: 5px;
    }

    .card-alarm.pending {
        border-left: 20px solid #e74c3c;
    }

    .card-alarm.inProgress {
        border-left: 20px solid #3498db;
    }

    .card-alarm.completed {
        border-left: 20px solid #27ae60;
    }

    .card-alarm-selected {
        background-color: #f4f4f4;
    }
</style>