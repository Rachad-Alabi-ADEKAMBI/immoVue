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
                                        <img class="card-img-top" :src='getImgUrl(detail.pic)' alt="Card image cap" width="60" height="60">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                              <span>
                                                {{ detail.first_name }} {{ detail.last_name  }}
                                              </span>
                                            </h5>
                                            <p class="card-text">
                                              {{ detail.id  }}
                                            </p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{detail.ads}} annonces</li>
                                            <li class="list-group-item">
                                              <i class="fab fa-whatsapp"></i> 654
                                            </li>
                                            <li class="list-group-item">
                                              <i class="fas fa-envelope"></i> {{ detail.email }}</li>
                                        </ul>
                                        <div class="card-body text-center">
                                            <a href="/adBySeller&id=detail.id" class="Sbtn btn-primary mx-auto">
                                              Annonces
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
                 axios.get('https://127.0.0.1/immo/api/users').then(
                 response =>
                 this.sellers = response.data);
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