import { createApp } from 'vue'
import App from './App'
import router from './router'
import store from './store'
import Notifications from '@kyvg/vue3-notification'
import '@fortawesome/fontawesome-free/css/all.css'

const app = createApp(App)

app.use(store)
app.use(router)
app.use(Notifications)

app.mixin({
  methods: {
    hasPermissions (permissions) {
      if (typeof permissions === 'object') {
        return permissions.some(permission => !this.$store.state['Settings'].permissions?.[permission]?.disabled || false)
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

app.mount('#app')

// store.dispatch('Settings/get').then(settings => {
//   app.mixin({
//     methods: {
//       hasPermissions (permissions) {
//         if (typeof permissions === 'object') {
//           return permissions.some(permission => !settings.permissions?.[permission]?.disabled || false)
//         } else {
//           return !settings.permissions?.[permissions]?.disabled || false
//         }
//       },
//       config (key) {
//         return key && settings.config[key] || null
//       },
//       user (key) {
//         return key && settings.user[key] || null
//       },
//       lang (key, def) {
//         return key && settings.lexicon[key] || def
//       },
//       categories() {
//         return settings.categories || {}
//       }
//     }
//   })
//   app.mount('#app')
// })
