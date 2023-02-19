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
                               <h2 class="span text-center subtitle">
                                 CATEGORIE MAISONS
                               </h2>
                             </div>

                             <div  v-for='ad in ads' :key="id">
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
         name: 'Ads',
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
            axios.get('http://127.0.0.1/immo/api/houses').then(
                 response =>
                 this.ads = response.data);
             }

       }
     }
     </script>