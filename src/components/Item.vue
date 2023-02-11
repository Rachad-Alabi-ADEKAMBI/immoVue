<template>
    <div class="content">
        <section class='section bg-light'>
            <div class="container">
                <div class="row mx-auto pt-5">
                        <div class="col-md-3">
                        <div class="tags ">
                            <div class="tags__heading text-center">
                                <p class="span">
                                    <i class="fas fa-list"></i> Localisataion
                                </p>
                            </div>

                        <div class="iframe">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        </div>

                            <Tags>

                            </Tags>
                         </div>

                        <div class="col-md-9">
                            <div class="item">
                                <div class="container ">
                                    <div class="row">
                                        <div class="item__heading">
                                            <h2 class='text-left'>
                                                Nom de la mmias
                                            </h2>

                                            <span class="price">
                                                fcf
                                            </span>
                                        </div>

                                        <div class="item__body">
                                            <div class="item__body__img">
                                                <img src="../assets/img/maison4.jpg" alt="">

                                            </div>

                                            <div class="item__body__images">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-3">
                                                            <img src="../assets/img/maison3.jpg" alt="">
                                                        </div>

                                                        <div class="col-sm-6 col-md-3">
                                                            <img src="../assets/img/maison3.jpg" alt="">
                                                        </div>

                                                        <div class="col-sm-6 col-md-3">
                                                            <img src="../assets/img/maison3.jpg" alt="">
                                                        </div>

                                                        <div class="col-sm-6 col-md-3">
                                                            <img src="../assets/img/maison3.jpg" alt="">
                                                        </div>
                                                </div>
                                                        </div>
                                                    </div>
                                                    <hr>

                                            <div class="item__body__text">
                                                <h3>
                                                    Description
                                                </h3>
                                                <p class="text text-grey text-left">
                                                    <i class="bi-bookmark-fill"></i> En vente <br> <br>


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
                                                <h3 class="" >
                                                    Informations supplémentaires
                                                </h3>

                                                <div class="infos">
                                                    <div class="info">
                                                        <i class="bi bi-eye"></i> 103 vues
                                                    </div>

                                                    <div class="info">
                                                        <i class="bi bi-share"></i> 52 partages
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="item__body__share">
                                                <p class="text text-black">
                                                    Partager cette annonce:
                                                </p>

                                                <div class="share-btns">
                                                    <div class="share-btn whatsapp">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </div>

                                                    <div class="share-btn facebook">
                                                        <i class="fab fa-facebook"></i>
                                                    </div>

                                                    <div class="share-btn mail">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <hr>

                            <div class="agent">
                                <div class="agent__heading">
                                <h3>
                                    Annonceur
                                </h3>
                                </div>
                                <div class="agent__infos">
                                    <img src="../assets/img/maison4.jpg" alt="">
                                    <div class="agent__infos__list">
                                        <h4>
                                            Sarah
                                        </h4>

                                        <div class="agent-contact">
                                            <div class="share-btn whatsapp">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </div>


                                                    <div class="share-btn phone">
                                                        <i class="fas fa-phone"></i>
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
        name: 'Item',
        components: {
    Tags
  },

      data(){
        return{
            details:[],
            parentMessage: 'Hello from the parent component!'
        }
      },
      mounted: function(){
          this.getItem();
      },
      methods:{
        getItem() {
            axios.get('http://127.0.0.1/immo/api/item/').then(
                response =>
                this.details = response.data);
            }
      }
    }
    </script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
