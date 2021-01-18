// Vue 2.0
// import Vue from 'vue'
// import axios from 'axios'
// Vue.use({
//     install(Vue){
//         Vue.prototype.$http = axios.create({
//             baseURL: 'http://localhost:8001/api/',
//             withCredentials: true
//         })
//     }
// })

import { baseUrl } from '@/global'

// Vue 3.0
import axios from 'axios'

const success = response => response
const error = err => {
    if (401 === err.response.status) {
        window.location = '/'
    } else {
        return Promise.reject(err)
    }
}

axios.defaults.baseURL = baseUrl
axios.defaults.withCredentials = true;
axios.interceptors.response.use(success, error)

export default axios