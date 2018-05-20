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
                            <div class="col-md-8" id="details" >
                                <div v-if="openedTab == 'Alarms'" style="display: flex; align-items: center; height: 100%; width: 100%">
                                    <div class="row" style="width: 100%">
                                        <div class="col-md-6" style="display: flex; align-items: center; justify-content: center">
                                            <i class="material-icons">account_circle</i> {{ selectedAlarm.user }}
                                        </div>
                                        <div class="col-md-6" style="display: flex; align-items: center; justify-content: center">
                                            <i class="material-icons">notification_important</i> {{ selectedAlarm.status }}
                                        </div>
                                    </div>
                                </div>

                                <div v-if="openedTab == 'UAVs'" style="display: flex; align-items: center; flex-direction: column; height: 100%; width: 100%">
                                    <div class="row" style="display: flex; align-items: center; width: 100%; margin-top: 10px">
                                        <div class="col-md-2" style="display: flex; align-items: center;"></div>
                                        <div class="col-md-3" style="display: flex; align-items: center;">
                                            <i class="material-icons">build</i> {{ selectedUAV.isReady ? 'Ready' : 'Not Ready' }}
                                        </div>
                                        <div class="col-md-3" style="display: flex; align-items: center;">
                                            <i class="material-icons">battery_full</i> {{ selectedUAV.battery }}%
                                        </div>
                                        <div class="col-md-3" style="display: flex; align-items: center;">
                                            <i class="material-icons">airplanemode_active</i> {{ selectedUAV.altitude }}
                                        </div>
                                        <div class="col-md-1" style="display: flex; align-items: center;"></div>
                                    </div>
                                    <br>
                                    <div class="row" style="width: 100%">
                                        <div class="col-md-2" style="display: flex; align-items: center;"></div>
                                        <div class="col-md-3" style="display: flex; align-items: center;">
                                            <i class="material-icons">place</i> {{ selectedUAV.latitude }}
                                        </div>
                                        <div class="col-md-3" style="display: flex; align-items: center;">
                                            <i class="material-icons">place</i> {{ selectedUAV.longitude }}
                                        </div>
                                        <div class="col-md-3" style="display: flex; align-items: center;">
                                            <i class="material-icons">history</i> {{ selectedUAV.updatedAt }}
                                        </div>
                                        <div class="col-md-1" style="display: flex; align-items: center;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body no-padding">
                        <div class="row" style="height: 500px; overflow: hidden;">
                            <div class="col-sm-4" id="cards">
                                <div class="card no-margin card-alarm" v-if="openedTab == 'Alarms'" v-for="alarm in alarms" :class="[{'card-selected' : selectedAlarm == alarm}, alarm.status]" @click="selectedAlarm = alarm">
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

                                <div class="card no-margin card-alarm" v-if="openedTab == 'UAVs'" v-for="uav in uavs" :class="[{'card-selected' : selectedUAV == uav}, uav.isReady ? 'completed' : 'pending']" @click="selectedUAV = uav">
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
                                <gmap-map v-if="openedTab == 'Alarms'" :center="selectedAlarm != null ? position(selectedAlarm) : defaultLocation" :zoom="13" ref="mmm" id="map">
                                    <gmap-marker :key="index" v-for="(alarm, index) in alarms" :position="position(alarm)"></gmap-marker>
                                </gmap-map>

                                <gmap-map v-if="openedTab == 'UAVs'" :center="selectedUAV != null ? position(selectedUAV) : defaultLocation" :zoom="13" ref="mmm" id="map">
                                    <gmap-marker :key="index" v-for="(uav, index) in uavs" :position="position(uav)"></gmap-marker>
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
                openedTab : "Alarms",
                defaultLocation : {
                    lat : 0,
                    lng : 0
                },
                alarms    : [],
                uavs      : [],
                selectedAlarm : {},
                selectedUAV   : {},
            }
        },
        mounted() {
            Echo.channel('UAVs')
                .listen('UAVLocationUpdated', (e) => {
                    console.log(e);
                    this.uavs.map((uav) => uav.id == e.uav.id ? uav = e.uav: null);
                });

            axios.get("/alarms").then((response) => {
                this.alarms = response.data.data;
                this.selectedAlarm = response.data.data[0];
            });

            axios.get("/uavs").then((response) => {
                this.uavs = response.data.data;
                this.selectedUAV = response.data.data[0];
            });
        },
        methods: {
            position(item) {
                return {
                    lat: item.latitude,
                    lng: item.longitude
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

    .card-selected {
        background-color: #f4f4f4;
    }
</style>