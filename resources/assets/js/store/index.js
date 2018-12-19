import Vue from 'vue';
import Vuex from 'vuex';

import auth from '../app/vuex/auth';
import loading from '../app/vuex/loading';
import uavs from '../app/vuex/uavs';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth,
        loading,
        uavs
    }
});