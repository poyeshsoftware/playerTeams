import Vuex from 'vuex'
import Vue from 'vue'
import actions from './actions'
import state from './state'
import mutations from './mutations'
import getters from './getters'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {},

    state,

    getters,

    actions,

    mutations
})









