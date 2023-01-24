<template>
    <section class="section">
      <div class="container">
          <div class="row ">
              <p class=" mt-2 mx-auto text-center">
                  Bonjour <span> user</span>, ravi de vous revoir
              </p>
          </div>

          <div class="row">
              <div class="col-sm-12 col-md-3">
                  <div class="menu">
                      <button class="btn btn-grey mt-2" @click="getMyAds()">
                          Mes annonces
                      </button>

                      <button class="btn btn-grey mt-2" @click="getMyAds()">
                          Nouvel ajout
                      </button>

                      <button class="btn btn-grey mt-2" @click='getSettings()'>
                          Paramètres
                      </button>
                  </div>
              </div>

              <div class="col-sm-12 col-md-9">
                <MyAds v-if="showMyAds"></MyAds>
                <Settings v-if="showSettings"></Settings>
              </div>

          </div>

      </div>
  </section>

  </template>



  <script>
  import MyAds from './MyAds.vue'
  import Settings from '../Settings.vue'

      export default {
          name: 'Dashboard',
          components: {
            MyAds,
            Settings
    },

        data(){
          return{
              ads:[],
              parentMessage: 'Hello from the parent component!',
              showMyAds : false,
              showSettings : false
          }
        },
        mounted: function(){
            this.getMyAds();
        },
        methods:{
              getMyAds() {
                this.showMyAds = true,
                this.showSettings = false
              },
              getSettings() {
                // alert('ok');
                this.showMyAds = false,
                this.showSettings = true
              },
        }
      }
      </script>

  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>

  </style>
