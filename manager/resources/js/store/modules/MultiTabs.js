import diff from '@/utils/diff'
import store from '@/store'

const state = {
  keys: [],
  values: []
}
const mutations = {
  addTabValue: (state, tab) => {
    state.values.forEach(v => v.active = false)
    tab.active = true

    if (state.values.some(v => {
      if (v.name === tab.name && (v.meta.groupTab || !v.meta.groupTab && diff(v.params, tab.params))) {
        Object.assign(v, tab)
        document.title = (v.title && v.title + ' - ' || '') + store.getters['Config/get']('site_name') + ' (EVO CMS Manager)'
        return true
      }
      return false
    })) {
      return
    }

    state.values.push(
      Object.assign(tab, {
        icon: tab.meta.icon || '',
        class: tab.meta.class || '',
        title: ((typeof tab.meta.title !== 'undefined' ? tab.meta.title : (tab.name || 'no-name')) + ' ' +
          (!tab.meta.groupTab && tab.params && tab.params.id ? tab.params.id : '')).trim()
      })
    )
  },
  addTabKey: (state, tab) => {
    const key = tab.path
    if (state.keys.includes(key)) return
    if (!tab.meta['noCache']) {
      state.keys.push(key)
    }
  },
  delTabValue: (state, tab) => {
    for (const [i, v] of state.values.entries()) {
      if (v.path === tab.path) {
        state.values.splice(i, 1)
        break
      }
    }
  },
  delTabKey: (state, tab) => {
    const index = state.keys.indexOf(tab.path)
    index > -1 && state.keys.splice(index, 1)
  },
  delTabKeys: state => {
    state.keys = []
  },
  delTabValues: state => {
    state.values = []
  },
  replaceTabValue: (state, { route, tab }) => {
    for (const [i, v] of state.values.entries()) {
      if (v.path === route.path) {
        state.values.splice(i, 1, tab)
        break
      }
    }
  }
}
const actions = {
  addTab ({ commit }, tab) {
    return new Promise(resolve => {
      commit('addTabValue', tab)
      commit('addTabKey', tab)
      resolve(tab)
    })
  },
  delTab ({ dispatch, state }, tab) {
    return new Promise(resolve => {
      dispatch('delTabValue', tab)
      dispatch('delTabKey', tab)
      resolve({
        values: [...state.values],
        keys: [...state.keys]
      })
    })
  },
  delTabValue ({ commit }, tab) {
    commit('delTabValue', tab)
  },
  delTabKey ({ commit }, tab) {
    commit('delTabKey', tab)
  },
  delAllTabs ({ dispatch, state }, tab) {
    return new Promise(resolve => {
      dispatch('delAllKeysTabs', tab)
      dispatch('delAllValuesTabs', tab)
      resolve({
        keys: [...state.keys],
        values: [...state.values]
      })
    })
  },
  delAllKeysTabs ({ commit, state }) {
    return new Promise(resolve => {
      commit('delTabKeys')
      resolve([...state.keys])
    })
  },
  delAllValuesTabs ({ commit, state }) {
    return new Promise(resolve => {
      commit('delTabValues')
      resolve([...state.values])
    })
  },
  replaceTab ({ commit }, { route, tab }) {
    return new Promise(resolve => {
      //dispatch('delTabKey', route)
      commit('replaceTabValue', { route, tab })
      resolve({
        tab: tab
      })
    })
  }
}

const getters = {
  keys: (state) => state.keys,
  values: (state) => state.values
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}
