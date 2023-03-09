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
                               ANNONCES DE {{ location }}
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
      parentMessage: 'Hello from the parent component!',
      ads: [],
    }
  },
  created() {
    this.getAds();
  },
  computed: {
    location() {
      return this.$route.query.location;
    },
  },
  methods:{
    async getAds(){
      try {
        const response = await axios.get(`http://immobilierbenin.com/api/location/${this.location}`);
        this.ads = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    getImgUrl(pic) {
      return "http://immobilierbenin.com/public/img/" + pic;
    },
    format(num){
      let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
      return res;
    }
  }
}
</script>