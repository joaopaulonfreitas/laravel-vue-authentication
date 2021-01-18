import { createApp } from 'vue'
import App from './App.vue'

import axios from './plugins/axios'

import router from './router'
import store from './store'

import './index.css'

const app = createApp(App).use(store).use(router)

app.config.globalProperties.$http = axios
app.config.devtools = false;

app.mount('#app')