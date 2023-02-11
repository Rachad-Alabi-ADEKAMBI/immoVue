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

   <div class="container" v-if='showAll'>
        <div class="row">
                <div class="col-9">
                            <h1 class="text-blue text-left">
                                Liste des utilisateurs
                            </h1>
                    </div>

                    <div class="col-3 text-left search-icon" @click="displaySearch()" v-if="showSearchBtn">
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
                                    <th scope="col">Annonces</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="userid">
                                <td data-label='Nom'>
                                        {{ user.first_name }} {{ user.last_name }}
                                </td>

                                <td data-label='Id' scope="row">
                                    <img :src='getImgUrl(user.pic)'   alt="" class="table-img">
                                </td>
                                <td data-label='ads'>
                                 {{ user.ads }}
                                </td>
                                <td>
                                    <i class="fas fa-eye" @click='viewOnline(user.id)'></i>
                                    <i class="fas fa-trash" @click='deleteAd(user.id)'></i>
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
           <div class="col-sm-12 col-md-6 mx-auto">
            <form action="" class="bg-light">
                <div class="form__close text-left">
                    <i class="bi bi-x"></i>
                </div>
                <p class="text-center">
                    Confirmez vous cette suppression ?
                </p>

                <div class="form-group row">
                            <div class="col-sm-10 mx-auto"><br>
                                <input type="text" class="form-control" id="" name='reason'
                                placeholder="Motif de suppression" value=''>
                            </div>
                        </div> <br>

               <div class="buttons mx-auto">
                    <label for="" class="m-2">
                        <button class="btn btn-green">
                            Oui
                        </button>
                    </label>

                    <label for="" class="m-2">
                        <button class="btn btn-red" @click="displayAll()">
                            Non
                        </button>
                    </label>
               </div>
            </form>
           </div>
        </div>
    </div>

    <div class="container" v-if="showEdit">
        <div class="row" v-for="detail in details" :key="detail.id">
           <div class="col-sm-12 col-md-6 mx-auto">
                {{ detail.id }}
           </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";


export default {
      name: 'Users',
      props: {

      },
  data(){
        return{
            showAll : true,
        showDelete : false,
        users: [],
        searchKey: '',
        showSearchBtn: true,
        showEdit: false,
        id: 2,
        showSearch: false
        }
  },
  mounted: function(){
    this.displayAll();
  },
  methods:{
    displayAll(){
            axios.get('https://127.0.0.1/immo/api/users').then(
                    response =>
                    this.users = response.data);
        this.showAll = true;
        this.showDelete = false,
        this.showSearch = false
    },
    getImgUrl(){

    },
    displaySearch(){
        this.showSearch = true;
        this.showAll = false;
    },
    deleteUser(){
        this.showAll = false;
        this.showDelete = true;
        this.showEdit = false;
    },
    viewOnline($id){
        this.$router.push('/');
    }
  }
  }
</script>