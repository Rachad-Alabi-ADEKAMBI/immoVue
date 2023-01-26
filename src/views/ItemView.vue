<template>
    <div class="home">
      <Item/>
    </div>
  </template>

  <script>
  // @ is an alias to /src
  import Item from '@/components/Item.vue'

  export default {
    name: 'ItemView',
    components: {
      Item
    }
  }
  </script>
