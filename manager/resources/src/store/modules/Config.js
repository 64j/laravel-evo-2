const state = {
  global: {},
  categories: {}
}

const mutations = {
  set (state, data) {
    state.global = data.config || {}
    state.categories = data.categories || {}
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
  },

  categories: () => {
    return state.categories
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}
