<template>
    <div class="">
      <AdsBySeller/>
    </div>
  </template>

  <script>
  // @ is an alias to /src
  import AdsBySeller from '@/components/AdsBySeller.vue'

  export default {
    name: 'AdsBySellerView',
    components: {
    AdsBySeller
    }
  }
  </script>
