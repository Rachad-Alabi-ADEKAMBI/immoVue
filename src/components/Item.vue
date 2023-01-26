<template>
<div class="content">
    <section class='section bg-light'>
    <div class="container">
        <div class="row mx-auto pt-5">
            <div class="col-md-3">
                <div class="tags">
                    <div class="tags__heading">
                        <span>
                            Localisation & informations
                        </span>
                    </div>

                    <div class="tags__body text-center">
                        <div class="image">
                            <img src="/public/img/logo.png" alt="">
                        </div>
                        <p>
                            <i class="bi bi-geo-alt"></i> adresse <br>

                            <span class="price">
                                300 000
                            </span>
                        </p>

                        <ul>
                            <li>
                                <i class="fas fa-bed"></i>
                                2 chambres
                            </li>

                            <li>
                                <i class="fas fa-shower"></i>
                                2 douches
                            </li>

                            <li>
                                <i class="bi-egg-fried"></i>
                                1 cuisne
                            </li>

                            <li>
                                <i class="bi bi-tv"></i>
                                1 salon
                            </li>

                            <li>
                                <i class="fas fa-warehouse"></i>
                                1 magasin
                            </li>
                        </ul>
                    </div>

                    <div class="tags">
                        <div class="tags__heading">
                            <span>
                                Reseaux sociaux
                            </span>
                        </div>
                    </div>

                    <Tags>

                    </Tags>
                </div>
            </div>

            <div class="col-md-9">
                <div class="item">s
                    <div class="container ">
                        <div class="row">
                            <div class="item__heading">
                                <h2 class='text-center mt-2'>
                                    Nom de la mmias
                                </h2>

                                <span class="mr-0">
                                    300 000 fcf
                                </span>
                            </div>

                            <div class="item__body">
                                <div class="item__body__img">
                                    <img src="../assets/img/maison4.jpg" alt="">

                                    <div class="">
                                        <img src="../assets/img/maison3.jpg" alt="">
                                        <img src="../assets/img/maison1.jpg" alt="">
                                        <img src="/public/img/maison1.jpg" alt="">
                                        <img src="/public/img/maison3.jpg" alt="">
                                        <img src="/public/img/maison1.jpg" alt="">
                                    </div>

                                </div>

                                <div class="item__body__text">
                                    <p class="text text-grey text-left">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe quae
                                        doloribus
                                        similique
                                        consequatur excepturi laudantium alias totam,
                                        hic expedita dolorum ipsam fugiat est? Magni rerum qui animi voluptatem
                                        tenetur
                                        esse?
                                    </p> <br>

                                    <p class="text text-grey">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe quae
                                        doloribus
                                        similique
                                        consequatur excepturi laudantium alias totam.
                                    </p>
                                </div>

                                <hr>

                                <div class="item__body__more-infos">
                                    <h3>
                                        Additionnal informations
                                    </h3>

                                    <p>
                                        Action: A vendre <br>
                                        Vues: 10vues <br>
                                        Reference:
                                    </p>
                                </div>

                                <hr>

                                <div class="item__body__share">
                                    <p class="text text-black">
                                        Partager cette annonce:

                                    <ul>
                                        <li><i class="bi bi-whatsapp"></i></li>
                                        <li><i class="bi bi-facebook"></i></li>
                                        <li><i class="bi bi-envelope"></i></li>
                                    </ul>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="agent">
                    <div class="agent__heading">
                        Annonceur
                    </div>

                    <div class="agent__infos">
                        <img src="" alt="">
                        <div class="agent__infos__list">
                            <h4>
                                Sarah
                            </h4>

                            <p class="text-grey">
                                Annonceur
                            </p>
                            <hr>

                            <p>
                                <i class="bi bi-whatsapp"></i> +229 9966 <br>
                                <i class="bi bi-phone"></i> +229 645
                            </p>
                            <hr>
                            <i class="bi bi-enveloppe"></i>
                        </div>

                        <div class="btn">
                            Contacter
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
import Tags from './Tags.vue'

    export default {
        name: 'Item',
        components: {
    Tags
  },

      data(){
        return{
            ads:[],
            parentMessage: 'Hello from the parent component!'
        }
      },
      mounted: function(){
        //  this.getAds();
      },
      methods:{
        getAds() {
           // alert('ok');
            }
      }
    }
    </script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
