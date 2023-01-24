<template>
   <div class="content">
      <section class="section">
          <div class="container">
              <div class="row">
                  <Tags class="col-sm-12 col-md-3">
                  </Tags>

                  <div class="col-sm-12 col-md-9">
                      <div class="list">
                        <div class="container">
                          <div class="row">
                            <div class="list__heading">
                              <h1>
                                Derniers ajouts
                              </h1>
                            </div>

                            <Box :message="parentMessage"></Box>
                                <Box :message="parentMessage"></Box>
                                <Box :message="parentMessage"></Box>
                              <hr>
                          </div>
                        </div>
                      </div>
                  </div>

              </div>
          </div>
      </section>
       </div>
</template>


<script>
import Box from './Box.vue'
import Tags from './Tags.vue'

    export default {
        name: 'Ads',
        components: {
    Box,
    Tags
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