<template>
    <div class="content">
        <div class="" v-if="details.length != 0">
            <section class='section bg-light' v-for="detail in details"
                                            :key="detail.id">
            <div class="container">
                <div class="row mx-auto pt-5">
                        <div class="col-md-3">
                        <div class="tags ">
                            <div class="tags__heading text-center">
                                <p class="span">
                                    <i class="fas fa-list"></i> Localisation
                                </p>
                            </div>

                        <div class="iframe">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        </div>

                        <div class="tags ">

            <div class="tags__body  text-center">
                    <div class="" v-if="detail.type !== 'Terrain'">
                                <div class="tag">
                                    <p v-if="detail.rooms == 1"> <i class="fas fa-bed"></i> {{ detail.rooms }}  chambre</p>
                                    <p v-if="detail.rooms > 1"> <i class="fas fa-bed"></i> {{ detail.rooms }}  chambres</p>
                                </div>

                        <hr>
                        <div class="tag">
                        <i class="fas fa-shower"></i> 1 douche
                        </div>

                        <hr>

                        <div class="tag">
                        <i class="bi bi-tv"></i> 1 salon
                        </div>

                        <hr>
                        <div class="tag">
                        <i class="fas fa-warehouse"></i> 1 magasin
                        </div>

                        <hr>
                        <div class="tag">
                        <i class="bi bi-car-front"></i> 1 garage
                        </div>

                        <hr>
                        <div class="tag">
                        <i class="fas fa-shower"></i> 1 douche
                        </div>
                    </div>

                    <div class="" v-if="detail.type === 'Terrain'">
                        <div class="tag">
                        <i class="fas fa-layer-group"></i> 500 m2
                        </div>

                    </div>
            </div>

            <div class="tags__btn text-center">
            <i class="bi bi-caret-down mx-auto" onclick='showTag1()'></i>
            </div>
            </div> <br>

                            <Tags>

                            </Tags>
                         </div>

                        <div class="col-md-9">
                                <div class="item">
                                <div class="container">
                                    <div class="row">
                                        <div class="item__heading">
                                            <h2 class='text-left'>
                                               {{detail.name}}
                                            </h2>

                                            <span class="price">
                                                {{ format(detail.price)}} XOF
                                            </span>
                                        </div>

                                        <div class="item__body">
                                            <div class="item__body__img">
                                                <img :src='getImgUrl(detail.pic1)'>
                                            </div>

                                            <div class="item__body__images">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-3">
                                                                <img :src='getImgUrl(detail.pic1)' class="pic">
                                                             </div>

                                                             <div class="col-sm-6 col-md-3" v-if="detail.pic3 && detail.pic3.trim() !== ''">
                                                            <img :src='getImgUrl(detail.pic3)' class="pic">
                                                        </div>

                                                        <div class="col-sm-6 col-md-3" v-if="detail.pic4 && detail.pic4.trim() !== ''">
                                                             <img :src='getImgUrl(detail.pic4)' class="pic">
                                                        </div>

                                                        <div class="col-sm-6 col-md-3" v-if="detail.pic5 && detail.pic5.trim() !== ''">
                                                            <img :src='getImgUrl(detail.pic5)' class="pic">
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

                                                        {{ detail.description}}
                                                </p>
                                            </div>

                                            <hr>

                                            <div class="item__body__more-infos">
                                                <h3 class="" >
                                                    Informations supplémentaires
                                                </h3>

                                                <p class="text text-grey">
                                                  {{ detail.more_description}}
                                                </p>

                                                <div class="infos">
                                                    <div class="info">
                                                        <i class="fas fa-calendar"></i> {{ detail.date_of_insertion}}
                                                    </div>

                                                    <div class="info">
                                                        <i class="bi bi-eye"></i> {{ format(detail.views)}}
                                                    </div>

                                                    <div class="info">
                                                        <i class="bi bi-share"></i> {{ format(detail.share)}}
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="agent">
                                <div class="agent__heading">
                                <h3>
                                    Annonceur
                                </h3>
                                </div>
                                <div class="agent__infos">
                                    <img :src="getImgUrl(detail.image)">
                                    <div class="agent__infos__list">
                                        <h4>
                                            {{  detail.first_name}}  {{  detail.last_name}}
                                        </h4>

                                        <div class="agent-contact">
                                            <a :href="'adsBySeller?id=' + detail.seller_id" class="btn btn-primary">
                                                Voir profil
                                            </a>

                                                <div class="share-btn whatsapp">
                                                    <a :href="'https://wa.me/' + detail.phone_code + detail.phone_number + '?text=Bonjour,%votre%annonce%sur%Immobilier%Bénin%...'">
                                                    <i class="fab fa-whatsapp"></i>
                                                     </a>
                                                </div>
                                                    <div class="share-btn phone" @click="callSeller(detail.phone_code, detail.phone_number)">
                                                        <i class="bi bi-phone"></i>
                                                    </div>

                                                    <div class="share-btn mail">
                                                    <a :href="'mailto:' + detail.email" >
                                                        <i class="fas fa-envelope"></i>
                                                     </a>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>


                                            <div class="item__body__share">
                                                <h3 class="">
                                                    Partager cette annonce:
                                                </h3>

                                                <div class="share-btns">
                                                    <div class="share-btn save"  @click="save(detail.id)">
                                                        <i class="far fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>

                                                    <div class="share-btn whatsapp"  @click="shareByWhatsapp(detail.id)">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </div>


                                                    <div class="share-btn facebook"  @click="shareByFacebook(detail.id)">
                                                        <i class="fab fa-facebook"></i>
                                                    </div>

                                                    <a  class="share-btn mail"
                                                    href="mailto:?subject=Decouvre cette annonce&amp;body=Voici l'URL de la page : https://immobilierbenin.com/item?id=detail.id">
                                                    <i class="fas fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <hr>


                        </div>
                </div>
            </div>
          </section>
        </div>

        <div v-if="details.length == 0">
            <section>
                <p class="text text-center">
                    Veuillez vérfifier votre demande
                </p>
            </section>
        </div>
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
           // id: ''
        }
      },
      computed: {
    id() {
      return this.$route.query.id;
    }
  },
      mounted: function(){
          this.getItem();
      },
      methods:{
        getItem() {
            axios.get(`https://immobilierbenin.com/api/item/${this.id}`)
  .then(response => (this.details = response.data))
  .catch(error => console.log(error))
            },
            format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "https://immobilierbenin.com/public/img/" + pic;
},
shareByWhatsapp(id){
window.location.replace('https://wa.me/?https://immobilierbenin.com/item/'+id);
},
callSeller(code, phone){
    window.location.href = 'tel:' + code + phone;
}
        }
    }
    </script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
