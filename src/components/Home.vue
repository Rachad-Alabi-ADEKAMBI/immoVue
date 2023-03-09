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
                                        </div>

                                        <button class="btn btn-primary">
                                            <a v-bind:href="'/item?id='+ detail.id">
                                                Voir
                                            </a>
                                        </button>
                                    </div>
                                </div>


                            </div>
                        <br>
                        <hr>
                        <div class="row">
                                <div class="list__heading">
                                    <h2 class='span text-center subtitle mt-3'>
                                       LES PLUS CONSULTEES
                                    </h2>
                                </div>

                                <div class="col-12 box" v-for="detail in details" :key="detail.id">
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
                                        </div>

                                        <button class="btn btn-primary">
                                            <a v-bind:href="'/item?id='+ detail.id">
                                                Voir
                                            </a>
                                        </button>
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
                axios.get('http://immobilierbenin.com/api/threeAds').then(
                response =>
                this.ads = response.data);
                axios.get('http://immobilierbenin.com/api/houses').then(
                response =>
                this.details = response.data);
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
