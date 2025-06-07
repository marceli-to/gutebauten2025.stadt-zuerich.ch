import { createApp } from 'vue'
import UserInteraction from './UserInteraction.vue'

const app = createApp({})

// Globally register component
app.component('user-interaction', UserInteraction)

// Mount to blade's DOM
app.mount('#interaction-app')