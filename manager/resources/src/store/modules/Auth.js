const state = {}

const mutations = {
  login (state) {
    console.log(state)
  },

  logout (state) {
    console.log(state)
  }
}

const actions = {
  login ({ commit, state }) {
    return new Promise(resolve => {
      commit('login')
      resolve(state)
    })
  },

  logout ({ commit, state }) {
    return new Promise(resolve => {
      commit('logout')
      resolve(state)
    })
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
