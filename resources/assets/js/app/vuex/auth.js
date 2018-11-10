import axios from 'axios'
import { isEmpty } from 'lodash'
import localforage from 'localforage'
import { setHTTPToken, removeHTTPToken } from '../../helpers'

const state = {
    check: false,
    user: {},
};

const getters = {
    check: (state) => { return state.check; },
    user: (state) => { return state.user; }
};

const mutations = {
    setAuthenticated(state, authenticated) { state.check = authenticated },
    setUser(state, user) { state.user = user; },
    removeUser(state) { state.user = null },
};

const actions = {
    register({ commit, dispatch }, { form }) {
        return new Promise((resolve, reject) => {
            axios.post('/register', form.data())
                .then(() => resolve())
                .catch(error => reject(error.response.data.errors));
        });
    },
    login({ commit, dispatch }, { form }) {
        return new Promise((resolve, reject) => {
            axios.post('/login', form.data())
                .then(response => {
                    dispatch('setToken', response.data.access_token).then(() => {
                        dispatch('fetchUser').then(() => {
                            commit('setAuthenticated', true);
                            resolve();
                        }).catch(error => reject(error.response.data.errors));
                    });
                })
                .catch(error => reject(error.response.data.errors));
        });
    },
    logout({ dispatch }) {
        return new Promise((resolve, reject) => {
            return axios.post('/logout').then(() => {
                dispatch('clearAuth');
                resolve();
            }).catch(() => reject());
        });
    },
    fetchUser({ commit, dispatch }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/user').then(response => {
                commit('setAuthenticated', true);
                commit('setUser', response.data.data);
                resolve()
            }).catch(() => reject());
        });
    },
    clearAuth({ commit, dispatch }) {
        commit('setAuthenticated', false);
        commit('removeUser');
        dispatch('clearToken');
    },
    checkTokenExists({ dispatch }) {
        return localforage.getItem('authToken').then((token) => {
            if(isEmpty(token)){
                return Promise.reject();
            }

            return dispatch('setToken', token).then(() => {
                return Promise.resolve();
            });
        })
    },
    setToken({ commit, dispatch }, token) {
        localforage.setItem('authToken', token);
        setHTTPToken(token);
    },
    clearToken() {
        localforage.removeItem('authToken');
        removeHTTPToken();
    }
};

export default
{
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}