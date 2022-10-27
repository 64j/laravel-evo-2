import http from '@/utils/http'

const state = {
  user: {},
  config: {},
  categories: {},
  permissions: {},
  lexicon: {},
  lang(key, d) {
    return this.lexicon[key] || d
  }
}

const mutations = {
  SET_SETTINGS: (state, settings) => {
    for (let i in settings) {
      state[i] = settings[i]
    }
  },
  DEL_SETTINGS: (state) => {
    for (let i in state) {
      state[i] = {}
    }
    http.token(null)
  }
}

const actions = {
  set ({ commit, state }, settings) {
    return new Promise(resolve => {
      commit('SET_SETTINGS', settings)
      resolve(state)
    })
  },
  get ({ commit, state }) {
    return new Promise(resolve => {
      return http.bootstrap().then(result => {
        commit('SET_SETTINGS', result.data || {})
        resolve(state)
      })
    })
  },
  del ({ commit }) {
    commit('DEL_SETTINGS')
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
