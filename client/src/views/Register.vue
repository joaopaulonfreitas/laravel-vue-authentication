<template>

  <page-template title="Cadastre-se">

    <form action="" method="POST" @submit.prevent="submit">
          
          <div class="grid  gap-6 grid-flow-row">

            <div>
              <label for="first_name" class="block text-sm font-medium text-gray-700">Nome</label>
              <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              type="text" id="first_name" placeholder="Nome" v-model="user.first_name" />
              <span class="text-sm text-red-500 p-1" v-if="error && error.first_name">{{error.first_name[0]}}</span>

            </div>

            <div>
              <label for="last_name" class="block text-sm font-medium text-gray-700">Sobrenome</label>
              <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              type="text" id="last_name" placeholder="Sobrenome" v-model="user.last_name"/>
              <span class="text-sm text-red-500 p-1" v-if="error && error.last_name">{{error.last_name[0]}}</span>
            </div>

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
              <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              type="text" id="email" placeholder="E-mail" v-model="user.email"/>
              <span class="text-sm text-red-500 p-1" v-if="error && error.email">{{error.email[0]}}</span>
            </div>

            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
              <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              type="password" id="password" placeholder="Senha" v-model="user.password"/>
              <span class="text-sm text-red-500 p-1" v-if="error && error.password">{{error.password[0]}}</span>
            </div>
            
            <div>
              <label for="password_confirm" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
              <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              type="password" id="password_confirm" placeholder="Confirmar Senha" v-model="user.password_confirm"/>
              <span class="text-sm text-red-500 p-1" v-if="error && error.password_confirm">{{error.password_confirm[0]}}</span>
            </div>
        
          </div>

          <div class="px-4 py-3  text-center sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Cadastrar
            </button>
          </div>


    </form>

  </page-template>

</template>

<script>

// console.log('Console Log')
// console.info('Console Info')
// console.debug('Console Debug')
// console.warn('Console Warn')
// console.error('Console Error')
// import router from 'vue-router'
//import axios from 'axios'

// import {baseUrl, userKey} from '@global'

import PageTemplate from '@/components/defaults/PageTemplate'

export default {
  name: 'Register',
  components:{
    PageTemplate
  },
  data(){
    return {
        user: {},
        error: null
    }
  }, 
  methods: {
    async submit(){
        await this.$http.post('/register', this.user).then(() => {
            this.$router.push({name: 'users'})
        }).catch(error => {
            this.error = {...error.response.data.errors}
        })
    }
  }
}
</script>

<style>

</style>