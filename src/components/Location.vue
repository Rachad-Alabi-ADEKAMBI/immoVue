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
                                 Annonces de {{ location }}
                               </h1>
                             </div>

                             <div :message="parentMessage" v-for='ad in ads' :key="id">
                                    <Box  :id="ad.id"></Box>
                                </div>

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
 import axios from "axios";


 import Box from './Box.vue'
 import Tags from './Tags.vue'

     export default {
         name: 'Location',
         components: {
     Box,
     Tags
   },
       data(){
         return{
                 ads: [],
                 location: 'Cotonou'
         }
       },
       mounted: function(){
           this.getAds();
       },
       methods:{
         getAds(location) {
            axios.get('http://127.0.0.1/immo/api/adsByLocation/'+location).then(
                response =>
                this.ads = response.data);
             }
       }
     }
     </script>