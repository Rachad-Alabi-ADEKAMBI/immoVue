<template>
        <div class="container"  v-if="showSearch">
            <div class="row">
                <div class="search-bar">
                    <label for="">Recherche par mot clé  <i class="bi bi-x bold"
                        @click="displayAll()"></i><br>
                        <input type="text" v-model="searchKey">
                    </label>
                </div>
            </div>

        </div>
        <div class="container"  v-if='showAll'>
            <div class="row">
                <div class="col-sm-9">
                            <h1 class="text-blue text-left">
                                Toutes les annonces
                            </h1>
                    </div>

                    <div class="col-sm-3 text-left search-icon" @click="displaySearch()" v-if="showSearchBtn">
                                <i class="bi bi-search"></i>
                                <p class="text text-grey">Chercher</p>
                    </div>
            </div>


            <div class="row">
                <div class="col-sm-12 col-md-10">
                    <div class="table-responsive-md">

                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ad in ads" :key="ad.id">
                                <td data-label='Nom'>
                                        {{ ad.id }}
                                </td>

                                <td data-label='Id' scope="row">
                                    <img :src='getImgUrl(ad.pic1)'   alt="" class="table-img">
                                </td>
                                <td data-label='Action'>
                                    {{ ad.id }}
                                </td>
                                <td data-label='Prix'>
                                 {{ ad.price }} F CFA
                                </td>
                                <td>
                                    <i class="fas fa-eye" @click='viewOnline(ad.id)'></i>
                                    <i class="fas fa-pen" @click='editAd()'></i>
                                    <i class="fas fa-trash" @click='deleteAd(ad.id)'></i>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" v-if="showDelete">
        <div class="row">
           <div class="col-sm-12 col-md-6 ">
            <form action="" class="bg-light">
                <div class="form__close text-left">
                    <i class="bi bi-x"></i>
                </div>
                <p class="text-center">
                    Confirmez vous cette suppression ?
                </p>

                <div class="form-group row">
                            <div class="col-sm-10"><br>
                                <input type="text" class="form-control" id="" name='reason'
                                placeholder="Motif de suppression" value=''>
                            </div>
                        </div> <br>

               <div class="buttons">
                    <label for="">
                        <button class="btn btn-green">
                            Oui
                        </button>
                    </label>

                    <label for="">
                        <button class="btn btn-red" @click="displayAll()">
                            Non
                        </button>
                    </label>
               </div>
            </form>
           </div>
        </div>
        </div>
</template>

<script>
import axios from "axios";

export default {
      name: 'Ads',
  props: {
   // message: ''
  },
  data(){
    return{
        ads: [],
        showAll: false,
        showSearchBtn: true,
        showSearch: true,
        showDelete: false,
        searchKey: ''
    }
  },
  mounted: function(){
        this.displayAll();
  },
   methods: {
    displayAll(){
            axios.get('https://127.0.0.1/immo/api/ads').then(
                    response =>
                    this.ads = response.data);
    this.showAll = true;
    this.showDelete = false;
    this.showSearch = false;
    },
    displaySearch(){
        this.showSearch = true;
        this.showAll = false;
    },
    deleteAd(){
        this.showAll = false;
    this.showDelete = true;
    },
    getImgUrl(){
        return (2);
    },
    format(num){
                let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 2 }).format(num);
                return res;
        },
        convert(date){
                        function addDaysToDate(date, days){
                                var res = new Date(date);
                                res.setDate(res.getDate() + days);
                                return res;
                            }
                             date_formated = addDaysToDate(date, 0);
                             return date_formated.toLocaleDateString('fr');
            }
      }


  }

</script>