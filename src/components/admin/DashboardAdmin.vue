<template>
  <section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="menu">

                    <a class="btn btn-white mt-2" @click="getAds()">
                        <i class="bi-list-task"></i> Annonces
                    </a>
                    <button class="btn btn-white mt-2" @click='getUsers()'>
                        <i class="bi bi-people-fill"></i> Utilisateurs
                    </button>
                    <button class="btn btn-white mt-2" >
                        <i class="bi bi-envelope"></i>  Webmail
                    </button>
                    <button class="btn btn-white mt-2" @click='getSettings()'>
                        <i class="bi bi-gear"></i> Paramètres
                    </button>
                </div>

                <nav class="navbar navbar-expand-lg navbar-light bg-light mobile-menu" >

                    <button class="navbar-toggler mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mr-0"
                     id="navbarSupportedContent">
                        <ul class="navbar-nav mr-0">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/ads" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Annonces
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="./index.php?action=appartments">Appartements</a>
                                    <a class="dropdown-item" href="./index.php?action=houses">Maisons</a>
                                    <a class="dropdown-item" href="./index.php?action=lands">Terrains</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/">Tout voir</a>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="/dashboardAdmin">Tableau adm</a>
                            </li>

                            <li class="nav-item">
                                <router-link to="/dashboard" class="nav-link" >
                                    Tableau user
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="dashboard">
                    <Ads v-if="showAds"></Ads>
              <Users v-if="showUsers"></Users>
              <Settings v-if="showSettings"></Settings>
                </div>
            </div>

        </div>





    </div>
</section>

</template>



<script>
import Users from './Users.vue'
// import Menu from './Menu.vue'
import Ads from './Ads.vue'
import Settings from '../Settings.vue'

    export default {
        name: 'DashboardAdmin',
        components: {
      //    Menu,
          Users,
          Ads,
          Settings
  },

      data(){
        return{
            ads:[],
            parentMessage: 'Hello from the parent component!',
            showAds : false,
            showSettings : false,
            showUsers: false,
        }
      },
      mounted: function(){
          this.getAds();
      },
      methods:{
            getAds() {
              this.showAds = true,
              this.showSettings = false,
              this.showUsers = false
            },
            getUsers() {
              this.showAds = false,
              this.showSettings = false,
              this.showUsers = true
            },
            getSettings() {
              // alert('ok');
              this.showAds = false,
              this.showSettings = true,
              this.showUsers = false
            }
      }
    }
    </script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
