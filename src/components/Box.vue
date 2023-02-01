<template>
    <div class="col-12 box">
    <div class="box__img">
        <img src="../assets/img/maison4.jpg" alt="">
        <p><span><i class="bi bi-tag"></i>Etat:</span> En vente</p>
    </div>

    <div class="box__infos" >
        <h2>
            {{ id }}
        </h2>

        <span>
            <i class="bi bi-geo-alt"></i> locat
        </span><br>

        <strong class="price">
            30 0000 fcfa
        </strong>

        <div class="icons">
            <div class="icon ">
                <i class="fas fa-bed"></i>
                2 chambres
            </div>

            <div class="icon">
                <i class="fas fa-shower"></i>
                2 douches
            </div>

            <div class="icon">
                <i class="bi-egg-fried"></i>
                1 cuisine
            </div>

            <div class="icon">
                <i class="bi bi-tv"></i>
                1 salon
            </div>

            <div class="icon">
                <i class="fas fa-warehouse"></i>
                1 magasin
            </div>

            <div class="icon">
                <i class="fas fa-layer-group"></i>
                500 m2
            </div>
        </div>

        <button class="btn btn-primary">
            <a href="/item">
                Voir
            </a>
        </button>
    </div>
</div>

<hr>
</template>

<script>
import axios from "axios";


export default {
      name: 'Box',
  props: {
    message: '',
    id: ''
  },
  data(){
    return{
        details: []
    }
  },
  mounted: function(){
   // this.getDetails();
  },
  methods:{
    getDetails(){
        axios.get('http://127.0.0.1/immo/api/item/1').then(
                response =>
                this.details = response.data);
            }
    }
}
</script>