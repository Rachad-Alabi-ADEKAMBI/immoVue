<template>
    <div class="">
      <Appartments/>
    </div>
  </template>

  <script>
  // @ is an alias to /src
  import Appartments from '@/components/Appartments.vue'

  export default {
    name: 'AppartmentsView',
    components: {
    Appartments
    }
  }
  </script>
