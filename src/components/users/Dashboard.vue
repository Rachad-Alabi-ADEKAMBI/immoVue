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
