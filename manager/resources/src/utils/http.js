import { toRaw } from 'vue'
// import store from '@/store'
// import router from '@/router'

export default {
  baseUrl: localStorage['EVO.HOST'] || '',

  setUrl () {
    return this.baseUrl + 'manager/api'
  },

  setBody (body) {
    if (!body) {
      return null
    }
    body = body || {}
    if (typeof body !== 'string') {
      body = JSON.stringify(toRaw(body))
    }
    return body
  },

  setHeaders (headers) {
    return Object.assign({
      'Cache': 'no-cache',
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + this.token()
    }, headers || {})
  },

  handlerResponse (response) {
    if (response.ok) {
      return response.json()
    }

    if (response.status === 401) {
      throw new Error('Something went wrong')
      // router.push({ name: 'AuthLogin' })
      // store.dispatch('Auth/logout').then(() => {})
      // if (location.hash !== '#/login') {
      //   store.dispatch('Settings/del').then(() => {})
      // }
    }

    return {}
  },

  handlerCatch (error) {
    return {
      errors: [error.message || '']
    }
  },

  token (token) {
    if (typeof token === 'undefined') {
      return localStorage.getItem('EVO.TOKEN') || ''
    } else if (null === token) {
      return localStorage.removeItem('EVO.TOKEN')
    }
    localStorage.setItem('EVO.TOKEN', token)

    return token
  },

  fetch (method, url, body) {
    if (method === 'get') {
      body = null
    } else {
      body = {
        method: url,
        params: body || []
      }
    }
    return fetch(this.setUrl(), {
      method: method,
      body: this.setBody(body || ''),
      headers: this.setHeaders()
    }).then(this.handlerResponse).catch(this.handlerCatch)
  },

  get (url) {
    return this.fetch('get', url)
  },

  post (url, body) {
    return this.fetch('post', url, body)
  },

  read (method, data) {
    return this.fetch('post', method + '@read', data)
  },

  create (method, data) {
    return this.fetch('post', method + '@create', data)
  },

  update (method, data) {
    return this.fetch('post', method + '@update', data)
  },

  delete (method, data) {
    return this.fetch('post', method + '@delete', data)
  },

  copy (method, data) {
    return this.fetch('post', method + '@copy', data)
  },

  list (method, data) {
    return this.fetch('post', method + '@list', data)
  },

  login (data) {
    return fetch(this.baseUrl + 'manager/login', {
      method: 'post',
      body: this.setBody(data),
      headers: this.setHeaders()
    }).then(response => {
      return response.ok && response.json().then(response => {
        if (response['token']) {
          this.token(response['token'])
        }
        return response
      }) || this.token(null)
    }).catch(this.handlerCatch)
  },

  logout () {
    fetch(this.baseUrl + 'manager/logout', {
      method: 'post',
      headers: this.setHeaders()
    }).then(() => {})
  },

  bootstrap (data) {
    return this.fetch('post', 'Bootstrap@run', data)
  }
}
