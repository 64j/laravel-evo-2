const state = {
  global: {}
}

const mutations = {
  set (state, data) {
    state.global = data
  }
}

const actions = {
  set ({ commit }, data) {
    commit('set', data)
  }
}

const getters = {
  get: (state) => (key) => {
    return key && state.global[key] || null
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}
