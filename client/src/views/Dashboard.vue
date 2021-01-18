<template>
  <!-- <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    Bem vindo
  </div> -->


  <div class="min-h-screen min-w-screen flex items-center justify-center">
    <div class="container mx-auto text-center">
      <h1 class="text-xl font-bold uppercase">{{message}}</h1>

      <p>Status da autenticação do usuário <b>{{auth ? "Logado" : "Não está logado"}}</b></p>
      
      <hr class="custom_hr my-3"/>
      

      <div class="flex justify-center py-2">

        <button v-if="auth" @click.prevent="logout"
      class="px-4 py-2 bg-red-700 hover:bg-red-500 text-white rounded">deslogar</button>
      
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
      message: "Aguarde..."
    }
  },
  async mounted(){

    try{
        const {data} = await this.$http.get('user')

        this.message = `Olá ${data.first_name}`
        await this.$store.dispatch('setAuth', true)

    }catch(e){

       this.message = `Você está deslogado`
        await this.$store.dispatch('setAuth', false)
    }
  },
  computed: {
    auth(){
     return this.$store.state.auth 
    }
  },
  methods: {
    async logout(){

      // await axios.post('logout', {})
      await this.$http.post('/logout', {})
      .then(() => { 
        this.$store.dispatch('setAuth', false)
        this.$router.push("/")
      })
      .catch((error) => {
         console.error(error)
      })

    }
  }
}
</script>

<style>
.custom_hr {
        border: 0;
        width: 100%;
        height: 1px;
        background-image: linear-gradient(to right,
            rgba(120, 120, 120, 0),
            rgba(120, 120, 120, 0.75),
            rgba(120, 120, 120, 0));
    }
</style>