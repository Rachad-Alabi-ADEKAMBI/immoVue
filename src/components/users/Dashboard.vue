<template>
    <section class="section">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-3">
                  <div class="menu">
                      <button class="btn btn-white" @click="getMyAds()">
                        <i class="bi-list-task"></i> Mes annonces
                      </button>

                      <button class="btn btn-white" @click="displayNewAd()">
                        <i class="bi bi-plus-circle"></i> Nouvel ajout
                      </button>

                      <button class="btn btn-white" @click='getSettings()'>
                        <i class="bi bi-gear"></i>  Paramètres
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

              <div class="col-sm-12 col-md-9">
                <div class="dashboard">
                    <p class="">
                  Bonjour <span> user</span>, ravi de vous revoir
              </p>
                    <MyAds v-if="showMyAds"></MyAds>
                <Settings v-if="showSettings"></Settings>
                <NewAd v-if="showNewAd"></NewAd>
                </div>
              </div>

          </div>

      </div>
  </section>

  </template>



  <script>
  import MyAds from './MyAds.vue'
  import Settings from '../Settings.vue'
  import NewAd from './NewAd.vue'

      export default {
          name: 'Dashboard',
          components: {
            MyAds,
            Settings,
            NewAd
    },

        data(){
          return{
              ads:[],
              parentMessage: 'Hello from the parent component!',
              showMyAds : false,
              showSettings : false,
              showNewAd: false
          }
        },
        mounted: function(){
            this.getMyAds();
        },
        methods:{
              getMyAds() {
                this.showMyAds = true,
                this.showSettings = false
                this.showNewAd = false
              },
              getSettings() {
                this.showNewAd = false,
                this.showMyAds = false,
                this.showSettings = true
              },
              displayNewAd(){
                this.showNewAd = true,
                this.showMyAds = false,
                this.showSettings = false

              }
        }
      }
      </script>

  <!-- Ad "scoped" attribute to limit CSS to this component only -->
  <style scoped>

  </style>
