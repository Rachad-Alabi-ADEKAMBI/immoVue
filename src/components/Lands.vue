<template>
    <!--hero starts-->
<div class="content">
    <section class='section bg-light'>
       <div class="container">
            <div class="row mx-auto pt-5">
                <Tags class="col-md-3">
                </Tags>

                <div class="col-md-9">
                    <div class="list">
                        <div class="container ">
                            <div class="row">
                                <div class="list__heading">
                                    <h2 class='text-center mt-2'>
                                        Terrains
                                    </h2>
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
<!--hero ends-->
</template>

<script>
import Box from './Box.vue'
import Tags from './Tags.vue'

    export default {
        name: 'Lands',
        components: {
    Box,
    Tags
  },

      data(){
        return{
            ads:[],
            parentMessage: 'Hello from the parent component!'
        }
      },
      mounted: function(){
     //     this.getAds();
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
