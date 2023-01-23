<template>
   <div class="content">
      <section class="section">
          <div class="container">
              <div class="row">
                <Box></Box>
                <Box></Box>
                <Box></Box>

              </div>
          </div>
      </section>
       </div>
</template>


<script>
import Box from './Box.vue'

    export default {
        name: 'Ads',
        components: {
    Box
  },
      data(){
        return{
                ads: []
        }
      },
      mounted: function(){
        //  this.getAds();
      },
      methods:{
        getAds() {
           // alert('ok');
            }
      }
    }
    </script>