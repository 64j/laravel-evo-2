import http from '@/utils/http'
// import router from '@/router'
// import store from '@/store'

const state = {
  user: {},
  config: {},
  lexicon: {},
  categories: {},
  permissions: {}
}

const mutations = {
  set: (state, settings) => {
    for (let i in settings) {
      state[i] = settings[i]
    }
  },
  del: (state) => {
    for (let i in state) {
      state[i] = {}
    }
    http.token(null)
    //store.dispatch('MultiTabs/delAllTabs').then(() => router.push({ name: 'AuthLogin' }))
  }
}

const actions = {
  set ({ commit, state }, settings) {
    return new Promise(resolve => {
      commit('set', settings)
      resolve(state)
    })
  },
  get ({ commit, state }) {
    return new Promise(resolve => {
      return http.bootstrap().then(result => {
        commit('set', result.data || {})
        resolve(state)
      })
    })
  },
  del ({ commit }) {
    commit('del')
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
