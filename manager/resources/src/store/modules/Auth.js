import http from '@/utils/http'
import router from '@/router'
import store from '@/store'

const state = {
  user: {},
  permissions: {}
}

const mutations = {
  check (state, data) {
    state.user = data.user || {}
    state.permissions = data.permissions || {}
    store.dispatch('Lang/set', data.lexicon || {}).then(() => {})
    store.dispatch('Config/set', {
      config: data.config || {},
      categories: data.categories || {}
    }).then(() => {})
  },

  login (state) {
    console.log(state)
  },

  logout (state) {
    state.user = {}
    router.push({ name: 'AuthLogin' }).then(() => {})
  }
}

const actions = {
  check ({ commit, state }) {
    return new Promise(resolve => {
      return http.bootstrap().then(result => {
        commit('check', result.data || {})
        resolve(state)
      })
    })
  },

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

const getters = {
  hasPermissions: (state) => (permissions) => {
    if (typeof permissions === 'object') {
      return permissions.some(
        permission => !state.permissions?.[permission]?.disabled || false)
    } else {
      return !state.permissions?.[permissions]?.disabled || false
    }
  },

  user: () => {
    return state?.user || {}
  },

  role: () => {
    return state?.user?.role || null
  },

  username () {
    return state?.user?.username || null
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}
