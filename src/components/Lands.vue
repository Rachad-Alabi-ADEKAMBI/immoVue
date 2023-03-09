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
                               CATEGORIE TERRAINS
                             </h2>
                           </div>

                           <div class="col-12 box" v-for="detail in ads" :key="detail.id">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Etat:</span> En vente</p>
                                  </div>

                                  <div class="box__infos" >
                                      <h2>
                                      {{ detail.name }}
                                      </h2>

                                      <span>
                                          <p class="text-grey">
                                              <i class="bi bi-geo-alt"></i>
                                              {{ detail.location }}, {{ detail.area }}
                                          </p>
                                              </span><br>

                                      <strong class="price">
                                          {{  format(detail.price) }} XOF
                                      </strong>

                                      <div class="icons">
                                        <div class="icon">
                <i class="fas fa-layer-group"></i>
                {{detail.size  }} m²
            </div>
                                      </div>

                                      <button class="btn btn-primary">
                                          <a v-bind:href="'/item?id='+ detail.id">
                                              Voir
                                          </a>
                                      </button>
                                  </div>
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
         /* axios.get('https://immobilierbenin.com/api/appartments').then(
               response =>
               this.ads = response.data);
               */
               axios.get('https://immobilierbenin.com/api/lands').then(
               response =>
               this.ads = response.data);
           },
           getImgUrl(pic) {
  return "http://127.0.0.1/immo/public/img/" + pic;
},
format(num){
  let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
  return res;

}

     }
   }
   </script>