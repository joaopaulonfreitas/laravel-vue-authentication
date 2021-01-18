<template>


<page-template title="Login">

        <form action="" method="POST" @submit.prevent="submit">

          <div v-if="error" class="bg-red-200 p-3 rounded mb-3 text-red-800">{{error}}</div>

          <div class="grid  gap-6 grid-flow-row">

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
              <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              type="text" id="email" placeholder="E-mail" v-model="user.email"/>              
            </div>

            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
              <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              type="password" id="password" placeholder="Senha" v-model="user.password"/>
            </div>
            
        
          </div>

          <div class="px-4 py-3  text-center sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Logar
            </button>
          </div>


        </form>

</page-template>


</template>

<script>

import PageTemplate from '@/components/defaults/PageTemplate'
// import {userKey} from '@/global'

export default {
  components: { PageTemplate },
  name: 'Login',
  component: {
    PageTemplate
  },
  mounted(){
    
  },
  data(){
    return {
      user: {},
    }
  }, 
  methods: {
    async submit(){
        await this.$http.post('/login', this.user).then(response => {
           
           const token = response.data.token
           
           if(token){
             this.$http.get('/user').then(response => {
                this.$store.commit('setUser', response.data)
                this.$router.push({ name: 'dashboard'})
             })
           }
           
        }).catch(error => {
             console.log(error)
         })
    }
  }
}
</script>

<style>

</style>