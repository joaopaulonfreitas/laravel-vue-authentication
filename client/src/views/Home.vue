<template>
  <!-- <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    Bem vindo
  </div> -->


  <div class="min-h-screen min-w-screen flex items-center justify-center">
    <div class="container mx-auto text-center">
      <h1 class="text-xl font-bold uppercase">{{message}}</h1>

    <div class="flex justify-center p-2">

      <router-link v-if="!auth" to="/login" 
      class="py-3 px-4 bg-gray-800 hover:bg-gray-600 text-white rounded">Logar Agora</router-link>

      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src

export default {
  name: 'Dashboard',
  components: {
    // HelloWorld
  },
  data(){
    return {
      message: "Olá, seja bem vindo ao nosso sistema de cadastro"
    }
  },
  async mounted(){

  },
  computed: {
    auth(){
     return this.$store.state.auth 
    }
  },
  methods: {

  }
}
</script>

<style>
</style>