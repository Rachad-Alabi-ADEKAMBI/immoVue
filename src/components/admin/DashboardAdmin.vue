<template>
  <section class="section">
    <div class="container">
        <div class="row ">
            <p class=" mt-2 mx-auto text-center">
                Bonjour <span> boss</span>, ravi de vous revoir
            </p>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="menu">
                    <button class="btn btn-grey mt-2" @click="getAds()">
                        Annonces
                    </button>
                    <button class="btn btn-grey mt-2" @click='getUsers()'>
                        Utilisateurs
                    </button>
                    <button class="btn btn-grey mt-2" >
                        Webmail
                    </button>
                    <button class="btn btn-grey mt-2" @click='getSettings()'>
                        Paramètres
                    </button>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
              <Ads v-if="showAds"></Ads>
              <Users v-if="showUsers"></Users>
              <Settings v-if="showSettings"></Settings>
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
