<template>
    <!--hero starts-->
<div class="content">
    <section class='section bg-light'>
       <div class="container">
            <div class="row-sm-12 col-md-12">
                <div class="hero p-2">
                    <h1>
                        Bienvenue à <br>
                        <span>
                            IMMOBILIER BENIN
                        </span>
                    </h1>

                    <p>
                        Site d'annonces de vente et de location de biens immobiliers
                    </p>
                </div>
            </div>

            <div class="row mx-auto pt-5">
                <Tags class="col-md-3">
                </Tags>

                <div class="col-sm-12 col-md-9">
                    <div class="list">
                        <div class="container ">
                            <div class="row">
                                <div class="list__heading">
                                    <h2 class='text-center mt-2'>
                                        Derniers ajouts
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
        name: 'Home',
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
          this.getAds();
      },
      methods:{
        getAds() {
         /*   axios.get('http://127.0.0.1/immo/api/ads').then(
                response =>
                this.ads = response.data);
                */
            }

      }
    }
    </script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
