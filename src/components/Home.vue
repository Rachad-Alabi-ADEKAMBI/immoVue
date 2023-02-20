<template>
    <!--hero starts-->
<div class="content">
    <section class='section bg-light'>
       <div class="container">

            <div class="row mx-auto pt-5">
                <Tags class="col-sm-12 col-md-12 col-lg-3">
                </Tags>

                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="list">
                        <div class="container ">
                            <div class="row">
                                <div class="list__heading">
                                    <h2 class='span text-center subtitle'>
                                        DERNIERS AJOUTS
                                    </h2>
                                </div>

                                <div  v-for='ad in ads' :key="ad.id">
                                    <Box  :id="ad.id"></Box>
                                </div>
                            </div>
                        <br>
                        <hr>
                        <br>

                        <div class="row">
                                <div class="list__heading">
                                    <h2 class='span text-center subtitle mt-3'>
                                       LES PLUS CONSULTEES
                                    </h2>
                                </div>

                                <div  v-for='ad in ads' :key="ad.id">
                                    <Box  :id="ad.id"></Box>
                                </div>
                                <br>

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
import axios from "axios";

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
            parentMessage: 'Hello from the parent component!',
            id: ''
        }
      },
      mounted: function(){
          this.getAds();
      },
      methods:{
        getAds() {
           axios.get('http://127.0.0.1/immo/api/threeAds').then(
                response =>
                this.ads = response.data);
            }

      }
    }
    </script>
