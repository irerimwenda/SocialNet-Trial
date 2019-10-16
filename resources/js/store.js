import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        //data from our application
        notifications: []
    },
    getters: {
        //help us return data from our state
    },
    mutations: {
        //help/(only thing) that will change state of our application
    },
    actions: {
        //call mutations (we can call many mutations at a time)
    }
})