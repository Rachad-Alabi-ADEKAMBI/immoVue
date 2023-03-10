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
                                 ANNONCEURS
                               </h2>
                             </div>

                            <div class="row">
                              <div class="col-sm-12 col-md-4 mx-auto cards " v-for="detail in sellers" :key="detail.id">
                                  <div class="card " style="width: 18rem;">
                                    <img v-if="detail.pic === ''" class="card-img-top"
                                    src="https://immobilierbenin.com/public/img/img1.jpg"
                                    alt="annonces de vente et location de biens immobilier au Bénin" width="60" height="60">
                                      <img v-else class="card-img-top" :src="getImgUrl(detail.pic)"
                                       alt="annonces de vente et location de biens immobilier au Bénin" width="200" height="120">


                                            <h5 class="card-title text-center fw-bold">
                                              <span>
                                                {{ detail.first_name }} {{ detail.last_name  }}
                                              </span>
                                            </h5>
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item">"{{ shortenString(detail.about, 25)}}"</li>

                                            <li class="list-group-item" v-if="detail.ads == 1"> <i class="fas fa-list-ol"></i> {{detail.ads}} annonce</li>
                                            <li class="list-group-item" v-if="detail.ads > 1">
                                              <i class="fas fa-list-ol"></i> {{detail.ads}} annonces</li>
                                            <li class="list-group-item">
                                              <i class="fab fa-whatsapp"></i> +   {{ detail.phone_code }} {{ detail.phone_number  }}
                                            </li>
                                            <li class="list-group-item">
                                              <i class="fas fa-envelope"></i> {{ shortenString(detail.email, 15) }}</li>
                                        </ul>
                                        <div class="card-body text-center">
                                          <a v-bind:href="'/adsBySeller?id='+ detail.id"  class="btn btn-primary">
                                                Voir
                                            </a>
                                        </div>
                                    </div>
                              </div>
                            </div>

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

  import Tags from './Tags.vue'

     export default {
         name: 'Sellers',
         components: {
     Tags
   },

       data(){
         return{
             sellers:[],
             parentMessage: 'Hello from the parent component!'
         }
       },
       mounted: function(){
           this.getSellers();
       },
       methods:{
         getSellers() {
                 axios.get('https://immobilierbenin.com/api/users').then(
                 response =>
                 this.sellers = response.data);
             },
             getImgUrl(pic) {
    return "https://immobilierbenin.com/public/img/" + pic;
             },
  format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
  },
  shortenString(str, size) {
    if (str.length <= size) {
      return str;
    } else {
      return str.slice(0, size) + '...';
    }
  }

       }
     }
     </script>