import { createRouter, createWebHistory } from 'vue-router'

//import store from '../store'
import axios from 'axios'

import Home from '../views/Home.vue'
import Dashboard from '../views/Dashboard.vue'
import Register from '../views/Register.vue'
import Users from '../views/Users.vue'
import Login from '../views/Login.vue'


// Global Configurations
// import { userKey } from '@/global'

const routes = [
  {path: '/',name: 'home',component: Home,},
  {path: '/register',name: 'register',component: Register},
  {path: '/login',name: 'login',component: Login},
  // Guard Router
  {path: '/dashboard',name: 'dashboard',component: Dashboard, meta: {requireIsAuthenticate: true}},
  {path: '/users',name: 'users',component: Users, meta: {requireIsAuthenticate: true}},
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

 function getAuthentication(){  
   return axios.get('user').then(res => res.data).catch(() => false)  
 }

// // Middleware:: Vue Navigation Guard
 router.beforeEach(async (to, from, next) => {

  console.log(to.name)
    const user = await getAuthentication()

    if(user && to.matched.some(record => record.meta.requireIsAuthenticate)){
      if(user && to.name !== "login") next()
      else next({name: 'login'})
    }else{

      if(user && to.name === "login") next({name: 'dashboard'})
      else next()      
    }
 })

export default router
