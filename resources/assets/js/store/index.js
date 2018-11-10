import Vue from 'vue';
import Vuex from 'vuex';

import auth from '../app/vuex/auth';
import loading from '../app/vuex/loading';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth,
        loading,
    }
});