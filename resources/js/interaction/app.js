import { createApp } from 'vue'
import App from './App.vue'
const app = createApp({})
app.component('interaction', App)
app.mount('#interaction-app')