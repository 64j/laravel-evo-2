import { createApp } from 'vue'
import App from './App'
import router from './router'
import store from './store'
import Notifications from '@kyvg/vue3-notification'
import '@fortawesome/fontawesome-free/css/all.css'

const app = createApp(App)

app.use(store)
app.use(Notifications)
app.use(router)
app.mount('#app')
