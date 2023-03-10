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
                                <div class="col-sm-12 col-md-5 mx-auto cards " v-for="detail in details" :key="detail.id">
                                  <div class="card " style="width: 18rem;">
                                    <img v-if="detail.pic === ''" class="card-img-top" src="https://immobilierbenin.com/public/img/img1.jpg" alt="annonces de vente et location de biens immobiliers, maison, appartements au Bénin" width="60" height="60">
                                      <img v-else class="card-img-top" :src="getImgUrl(detail.pic)" alt="annonces de vente et location de biens immobilier au Bénin" width="200" height="120">


                                            <h5 class="card-title text-center fw-bold">
                                              <span>
                                                {{ detail.first_name }} {{ detail.last_name  }}
                                              </span>
                                            </h5>
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item">"{{ detail.about}}"</li>

                                            <li class="list-group-item" v-if="detail.ads == 1">
                                              <i class="fa-solid fa-list-ol"></i> {{detail.ads}} annonce</li>
                                            <li class="list-group-item" v-if="detail.ads > 1">{{detail.ads}} annonces</li>
                                            <li class="list-group-item">
                                              <i class="fab fa-whatsapp"></i> +   {{ detail.phone_code }} {{ detail.phone_number  }}
                                            </li>
                                            <li class="list-group-item">
                                              <i class="fas fa-envelope"></i> {{ detail.email }}</li>
                                        </ul>
                                    </div>
                              </div>
                             </div>

                            </div>
                           <div class="row">
                             <div class="list__heading">
                               <h2 class="span text-center subtitle">
                                 ANNONCES
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

                                        <div class="icons" v-if="detail.type !== 'Terrain'">
                                            <div class="icon ">
                                                <i class="fas fa-bed"></i>
                                                {{ detail.rooms }} chambres
                                            </div>

                                            <div class="icon">
                                                <i class="fas fa-shower"></i>
                                                {{ detail.bathrooms }} douches
                                            </div>

                                            <div class="icon">
                                                <i class="bi-egg-fried"></i>
                                                {{ detail.kitchens }} cuisine
                                            </div>

                                            <div class="icon">
                                                <i class="bi bi-tv"></i>
                                                {{detail.living_rooms  }} salons
                                            </div>

                                            <div class="icon">
                                                <i class="fas fa-warehouse"></i>
                                                {{detail.living_rooms  }} magasins
                                            </div>

                                            <div class="icon">
                                              <i class="bi bi-car-front"></i>
                                              {{detail.parkings  }} parking
                                        </div>
                                        </div>

                                        <div class="icons" v-if="detail.type === 'Terrain'">
                                            <div class="icon">
                                                    <i class="fas fa-layer-group"></i>
                                                    {{detail.area  }} m²
                                            </div>
                                        </div>

                                            <a v-bind:href="'/item?id='+ detail.id"  class="btn btn-primary">
                                                Voir
                                            </a>
                                    </div>
                                </div>
                             <hr>
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
         name: 'AdsBySeller',
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
       computed: {
    id() {
      return this.$route.query.id;
    }},
       mounted: function(){
           this.getAds();
       },
       methods:{
            getAds() {
                axios.get(`https://http://immobilierbenin.com/api/user/${this.id}`)
  .then(response => (this.details = response.data))
  .catch(error => console.log(error)),

            axios.get(`https://immobilierbenin.com/api/adsBySeller/${this.id}`)
  .then(response => (this.ads = response.data))
  .catch(error => console.log(error))
            },
             getImgUrl(pic) {
    return "https://immobilierbenin.com/public/img/" + pic;
},
format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;

}

       }
     }
     </script>