import http from '@/utils/http'
import router from '@/router'
import store from '@/store'

const state = {
  user: {},
  permissions: {},
  errors: {},
  token: null
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

  login (state, data) {
    http.login(data).then(response => {
      return response.json().then(response => {
        if (response) {
          if (data.remember) {
            if (!data.hosts[data.host]) {
              data.hosts[data.host] = data.host
            }
            localStorage['EVO.HOSTS'] = JSON.stringify(data.hosts)
            localStorage['EVO.HOST'] = data.host
          }
        }

        if (response.errors) {
          state.errors = response.errors
        } else {
          localStorage['EVO.TOKEN'] = response['token'] || null
        }

        return response
      })
    })
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

  login ({ commit }, data) {
    return http.login(data).then()
  },

  login2 ({ commit, state }, data) {
    return new Promise(resolve => {
      commit('login', data)
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
