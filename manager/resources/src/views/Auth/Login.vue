<template>
  <div class="main w-100 h-100 d-flex flex-nowrap bg-dark">
    <div class="col-auto sidebar p-5 bg-dark bg-opacity-75 text-white text-opacity-75">
      <form @submit.prevent="submit">

        <div class="form-group form-floating mb-3">
          <input v-model="data.host"
                 type="text"
                 id="floatingHost"
                 class="form-control form-control-lg rounded-0 border-light bg-transparent text-white"
                 @focus="listOpen"
                 @blur="listClose"
                 placeholder="Hostname"
                 :class="{'border-danger': isErrors}">
          <label for="floatingHost">Valid hostnames</label>

          <div class="input-list position-absolute w-100 bg-light text-dark">
            <div v-for="(host, k) in hosts" :key="k" class="px-3 py-2 d-flex align-items-center justify-content-between" @mousedown="listSelect">
              <span>{{ host }}</span>
              <i class="fa fa-remove text-danger float-end input-list-remove" @mousedown.stop="listRemoveItem" />
            </div>
          </div>
        </div>

        <div class="form-group form-floating mb-3">
          <input v-model="data.username"
                 type="text"
                 id="floatingName"
                 class="form-control form-control-lg rounded-0 border-light bg-transparent text-white"
                 placeholder="Username"
                 :class="{'border-danger': isErrors}"
                 autofocus>
          <label for="floatingName">Username</label>
        </div>

        <div class="form-group form-floating mb-3">
          <input v-model="data.password"
                 type="password"
                 id="floatingPassword"
                 class="form-control form-control-lg rounded-0 border-light bg-transparent text-white"
                 placeholder="Password"
                 :class="{'border-danger': isErrors}">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="row align-items-center">
          <div class="col">
            <div class="form-check">
              <input v-model="data.remember"
                     type="checkbox"
                     id="remember"
                     class="form-check-input rounded-0 border-light bg-transparent"
                     :false-value="0"
                     :true-value="1">
              <label class="form-check-label" for="remember">Remember me</label>
            </div>
          </div>
          <div class="col-auto">
            <button class="btn btn-success rounded-0" type="submit">Login</button>
          </div>
        </div>

        <div class="errors text-danger py-3 text-center" v-show="isErrors">Incorrect username or password entered!</div>

      </form>
    </div>
  </div>
</template>

<script>
import http from '@/utils/http'
import store from '@/store'

export default {
  name: 'AuthLogin',
  data () {
    return {
      isErrors: false,
      data: {
        ajax: 1,
        username: '',
        password: '',
        remember: 1,
        host: localStorage['EVO.HOST'] || location.origin + '/'
      },
      hosts: localStorage['EVO.HOSTS'] && JSON.parse(localStorage['EVO.HOSTS']) || {}
    }
  },
  methods: {
    submit () {
      this.isErrors = false

      http.baseUrl = this.data.host = this.data.host.replace(/\/$/, '') + '/'

      http.login(this.data).then(result => {
        if (result) {
          if (this.data.remember) {
            if (!this.hosts[this.data.host]) {
              this.hosts[this.data.host] = this.data.host
            }
            localStorage['EVO.HOSTS'] = JSON.stringify(this.hosts)
            localStorage['EVO.HOST'] = this.data.host
          }

          store.dispatch('Settings/get').then(settings => {
            if (settings.user.role) {
              this.$router.push({ name: 'DashboardIndex' })
            } else {
              this.isErrors = true
            }
          })
        } else {
          this.isErrors = true
        }
      })
    },

    listOpen(event) {
      event.currentTarget.parentElement.classList.add('active')
    },

    listClose(event) {
      event.currentTarget.parentElement.classList.remove('active')
    },

    listSelect(event) {
      this.data.host = event.target.innerText
    },

    listRemoveItem(event) {
      let host = event.target.parentElement.innerText
      for (let i in this.hosts) {
        if (this.hosts[i] === host) {
          delete this.hosts[i]
        }
      }
      if (this.data.host === host) {
        this.data.host = ''
      }
      if (localStorage['EVO.HOST'] === host) {
        localStorage['EVO.HOST'] = ''
      }
      localStorage['EVO.HOSTS'] = JSON.stringify(this.hosts)
    }
  }
}
</script>

<style scoped>
.main { background: url("https://picsum.photos/1600/900") 50% 50% no-repeat; background-size: cover }
.sidebar { width: 30rem; max-width: 100%; }
.active .input-list { display: block; }
.input-list { display: none; z-index: 10; }
.input-list > div:hover { background: var(--bs-primary); color: var(--bs-light); }
.input-list-remove { cursor: pointer }
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
  -webkit-box-shadow: 0 0 0 2rem black inset !important;
  -webkit-text-fill-color: #fff !important;
}
</style>
