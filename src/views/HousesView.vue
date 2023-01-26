<template>
    <div class="">
      <Houses/>
    </div>
  </template>

  <script>
  // @ is an alias to /src
  import Houses from '@/components/Houses.vue'

  export default {
    name: 'HousesView',
    components: {
    Houses
    }
  }
  </script>
