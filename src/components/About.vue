<template>
    <section>
      <div class="container about">
        <div class="row bg-light bg-transparent">
          <div class="col-sm-12 col-md-6">
            <img src="https:immobilierbenin.com/public/img/bureau2.jpg" alt="">
          </div>

          <div class="col-sm-12 col-md-6 about__text " >
              <h2 class="subtitle mt-2" >
                A propos
              </h2>

              <p class="text text-justify">
                Bienvenue sur immobilierbenin, votre site d'annonces de vente et de location de biens immobiliers au Bénin.
                Nous offrons un service gratuit d'annonces de vente et de location de biens immobiliers pour tous les utilisateurs.
                Vous pouvez publier vos annonces en quelques clics seulement et les mettre à jour à tout moment. <br>
                Notre objectif est de faciliter la recherche de propriétés immobilières au Bénin pour les acheteurs et les locataires potentiels. Parcourez notre sélection de biens immobiliers et trouvez votre prochaine maison, appartement ou local commercial. Nous sommes là pour vous aider à réaliser vos projets immobiliers, sans frais cachés ni commissions.
                 N'hésitez pas à  contacter notre équipe si vous avez des questions ou des demandes spécifiques.
              </p>

             <div class="buttons">

              <a class="btn btn-success" href="/contact" >
                Contact
              </a>
             </div>

          </div>
        </div>
      </div>
    </section>
</template>


<script>
import axios from "axios";
import Tags from './Tags.vue'

  export default {
      name: 'About',
      components: {
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
              axios.get('https://immobilierbenin.com/api/ads').then(
              response =>
              this.ads = response.data);
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

