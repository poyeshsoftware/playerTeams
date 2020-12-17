import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

import createPersistedState from 'vuex-persistedstate'
import actions from './actions'
import state from './state'
import mutations from './mutations'
import getters from './getters'

Vue.use(Vuex);

export default new Vuex.Store({
    plugins: [createPersistedState({
        storage: window.sessionStorage,
    })],
    state,

    getters,

    actions,

    mutations
})









