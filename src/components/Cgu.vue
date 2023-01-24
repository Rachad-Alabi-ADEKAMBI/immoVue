<template>
    <!--hero starts-->
<div class="content">
    <section class='section bg-light'>
       <h1>
        CGu
       </h1>

    </section>
</div>
<!--hero ends-->
</template>

<script>

    export default {
        name: 'Cgu',
        components: {
  },

      data(){
        return{
            ads:[],
            parentMessage: 'Hello from the parent component!'
        }
      },
      mounted: function(){
      //    this.getAds();
      },
      methods:{
        getAds() {
           // alert('ok');
            }
      }
    }
    </script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
