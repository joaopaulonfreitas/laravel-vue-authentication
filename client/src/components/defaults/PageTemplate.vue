<template>
<!-- 
<slot name="header"></slot>

Use
<base-layout>
  <template v-slot:header>
    <h1>Here might be a page title</h1>
  </template>

  <template v-slot:default>
    <p>A paragraph for the main content.</p>
    <p>And another one.</p>
  </template>

  <template v-slot:footer>
    <p>Here's some contact info</p>
  </template>
</base-layout>
 -->
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold leading-tight text-gray-900">
        {{title}}
      </h1>
    </div>
  </header>

  <main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <!-- Replace with your content -->

      <!-- <div class="mt-5 md:mt-0 max-w-md w-full space-y-8 mx-auto"> -->
      <div class="mt-5 md:mt-0 w-full space-y-8 mx-auto">

      <slot></slot>

      </div>

      <!-- /End replace -->
    </div>
  </main>

</template>

<script>

export default {
  props:{
    title: {
      type: String,
      default: "Título"
    }
  },
  data(){
    return {
        
    }
  }, 
  methods: {
   
  }
}
</script>

<style>

</style>