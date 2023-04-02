<template>
    <!--hero starts-->
<div class="content">
    <section class='section bg-light'>

        <div class="container mt-2">
            <div class="hero">
                                <div class="hero__content">
                                    <h1 class="animation">
                                    {{ mot }}
                                    </h1>
                                    <p class="text text-white">
                                        Annonces de vente & location de biens immobiliers
                                    </p>
                                    <a href="/ads" class="btn btn-link">
                                        Voir les annonces
                                    </a>
                                </div>
                            </div>
        </div>
       <div class="container">

            <div class="row mx-auto pt-5">
                <Tags class="col-sm-12 col-md-12 col-lg-3">
                </Tags>

                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="list">
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
                                <div class="col-sm-12 col-md-6">
                                    <img src="https://immobilierbenin.com/public/img/appart1.jpeg" alt="appartement a louer a cotonou benin"
                                    class="about-img">
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <h2 class="subtitle">
                                        Qui sommes nous ?
                                    </h2>

                                    <p class="text text-justify">
                                        Bienvenue sur immobilierbenin, votre site d'annonces de vente et de location de biens immobiliers au Bénin.
                                        Nous offrons un service gratuit d'annonces de vente et de location de biens immobiliers pour tous les utilisateurs.
                                        Vous pouvez publier vos annonces en quelques clics seulement et les mettre à jour à tout moment ...
                                    </p>

                                    <a href="/about" class="btn btn-primary">
                                        A propos
                                    </a>
                                </div>
                        </div> <hr>
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


    </section>
</div>
<!--hero ends-->
</template>

<script>
import axios from "axios";
import Search from "./Search.vue";
import Tags from './Tags.vue'

    export default {
        name: 'Home',
        components: {
    Tags,
    Search
  },

      data(){
        return{
            ads:[],
            parentMessage: 'Hello from the parent component!',
            id: '',
            details: [],
            mot: 'IMMOBILIER BENIN',
            indexLettre: 0,
    motAffiche: ''
        }
      },
      mounted: function(){
          this.getAds();
      },
      created() {
    setInterval(() => {
      if (this.indexLettre < this.mot.length) {
        this.motAffiche += this.mot[this.indexLettre];
        this.indexLettre++;
      }
    }, 200);
  },
      methods:{
        getAds() {
                axios.get('https://immobilierbenin.com/api/threeAds').then(
                response =>
                this.ads = response.data);
                axios.get('https://immobilierbenin.com/api/houses').then(
                response =>
                this.details = response.data);
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
