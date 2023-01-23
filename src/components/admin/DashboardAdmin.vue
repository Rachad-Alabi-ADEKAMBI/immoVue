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
              <Menu></Menu>
            </div>

            <div class="col-sm-12 col-md-9">
             mvjfnvjkfnvjf anfjsdn
            </div>
        </div>

    </div>
</section>
<Users></Users>
</template>



<script>
import Users from './Users.vue'
import Menu from './Menu.vue'

    export default {
        name: 'DashboardAdmin',
        components: {
          Menu,
                    Users
  },

      data(){
        return{
            ads:[],
            parentMessage: 'Hello from the parent component!'
        }
      },
      mounted: function(){
       //   this.getAds();
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
