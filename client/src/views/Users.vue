<template>
  <page-template title="Usuários Cadastrados">
    
    
    <table class="w-full table-auto border rounded">
      <thead>
        <tr>
          <th class="border p-2">Nome</th>
          <th class="border p-2">E-mail</th>
        </tr>
      </thead>
      <tbody>

        <tr class="border" v-for="(user, index) in users" :key="index">
          <td class="border p-2">{{user.first_name}} {{user.last_name}}</td>
          <td class="border p-2">{{user.email}}</td>
        </tr>

      </tbody>
    </table>


<!-- 
  created_at: "2021-01-11T16:19:12.000000Z"
  current_team_id: null
  email: "joaopaulonfreitas@gmail.com"
  email_verified_at: null
  first_name: "João Paulo"
  id: 1
  last_name: "do N. Freitas"
  profile_photo_path: null
  profile_photo_url: "https://ui-avatars.com/api/?name=&color=7F9CF5&background=EBF4FF"
  updated_at: "2021-01-12T11:10:49.000000Z 
  -->


  </page-template>
</template>

<script>
import PageTemplate from '@/components/defaults/PageTemplate'
// @ is an alias to /src

export default {
  name: 'Users',
  components: {
    PageTemplate
    // HelloWorld
  },
  data(){
    return {
      users: {},
      message: "Olá, seja bem vindo ao nosso sistema de cadastro"
    }
  },
  async mounted(){
    this.getUsers()
  },
  computed: {
    auth(){
     return this.$store.state.auth 
    }
  },
  methods: {
    async getUsers(){
        const response = await this.$http.get('/users')
        if(response && response.data){
          this.users = response.data
        }
    }
  }
}
</script>

<style>
</style>