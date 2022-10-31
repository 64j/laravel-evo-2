import { createApp } from 'vue'
import App from './App'
import router from './router'
import store from './store'
import Notifications from '@kyvg/vue3-notification'
import '@fortawesome/fontawesome-free/css/all.css'

const app = createApp(App)

app.use(store)
app.use(Notifications)

store.dispatch('Auth/check').then(() => {
  app.mixin({
    methods: {
      hasPermissions (permissions) {
        if (typeof permissions === 'object') {
          return permissions.some(
            permission => !this.$store.state['Settings'].permissions?.[permission]?.disabled || false)
        } else {
          return !this.$store.state['Settings'].permissions?.[permissions]?.disabled || false
        }
      },
      config (key) {
        return key && this.$store.state['Settings'].config[key] || null
      },
      user (key) {
        return key && this.$store.state['Settings'].user[key] || null
      },
      lang (key, def) {
        return key && this.$store.state['Settings'].lexicon[key] || def
      },
      categories () {
        return this.$store.state['Settings'].categories || {}
      }
    }
  })

  app.use(router)
  app.mount('#app')

  // if (!result?.user?.role) {
  //   router.push({ name: 'AuthLogin' })
  // }
})
