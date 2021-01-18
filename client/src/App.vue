<template>

  <nav id="nav" class="bg-gray-800">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="flex items-center justify-between h-16">
    
        <div class="flex items-center">
        <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              


              <router-link class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" 
              to="/">Home</router-link>

              <router-link class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" 
              to="/register">Register</router-link>

              <router-link v-if="!getAuthUser" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" 
              to="/login">Login</router-link>

            </div>
          </div>
        </div>


        
    

    </div>
    
    </div>

  </nav>

  <router-view/>

</template>

<script>

//import {userKey} from "@/global"
import {mapGetters} from "vuex"

export default {
  name: "App",
  components: {},
  computed: mapGetters(['getAuthUser', 'getUser']),
  data(){
    return {
      validatingAuthLogin: true
    }
  },
  methods: {
  
    async validateAuthLogin(){
      this.validatingAuthLogin = true

      const userData = this.$store.state.user

      if(!userData){
        this.validatingAuthLogin = false
        this.$router.push({name: 'login'})
        return
      }

      const response = await this.$http.get('/user')

      console.log("Carregou o App.vue")
      
      if(response && response.data){
        this.$store.commit('setUser', response.data)
      }else{
        this.$store.commit('setUser', null)
        this.$router.push({name: 'login'})
      }

      this.validatingAuthLogin = false

    }
  },
  created() {
    this.validateAuthLogin()
  }
}
</script>

<style>
  #nav{color:#000;}
</style>
