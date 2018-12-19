import axios from 'axios'
import { isEmpty } from 'lodash'

const state = {
    uavs: [],
};

const getters = {
    uavs: (state) => { return state.uavs; },
};

const mutations = {
    setUavs(state, uavs) { state.uavs = uavs; },
};

const actions = {
    fetch({ commit, dispatch }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/uavs').then(response => {
                commit('setUavs', response.data.data);
                resolve()
            }).catch(() => reject());
        });
    },
    
};

export default
{
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}