import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        //data from our application
        notifications: [],
        posts: [],
        auth_user: {}
    },
    getters: {
        //mthods/functions that help us return data from our state
        all_notifications(state) {
            return state.notifications
        },
        all_notifications_count(state) {
            return state.notifications.length
        }
        ,all_posts(state) {
            return state.posts
        }
    },
    mutations: {
        //help/(only thing) that will change state of our application
        add_notification(state, notification) {
            state.notifications.push(notification)
        },
        add_post(state, post) {
            state.posts.push(post)
        },
        auth_user_data(state, user) {
            state.auth_user = user
        }
    },
    actions: {
        //call mutations (we can call many mutations at a time)
    }
})