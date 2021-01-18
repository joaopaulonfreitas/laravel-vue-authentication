import { createStore } from 'vuex'

import createdPersistedState from 'vuex-persistedstate'

export default createStore({
  state: {
    auth: false,
    user: {}
  },
  getters: {
      getAuthUser(state){
        return state.auth
      },
      getUser(state){
        return state.user
      }
  },
  mutations: {
    setAuth: (state, auth) => state.auth = auth,
    setUser: (state, user) => {
      state.user = user
      state.auth = user ? true : false
    }
  },
  actions: {
    setAuth: ({commit}, auth) => commit('setAuth', auth),
    setUser: ({commit}, user) => commit('setUser', user),
  },
  modules: {},
  plugins: [
    createdPersistedState()
  ]
})
