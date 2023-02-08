<template>
    <div class="col-12 box" v-for="detail in details" :key="detail.id">
    <div class="box__img">
        <img src="../assets/img/maison4.jpg" alt="">
        <p class="text text-grey"><span><i class="bi bi-tag"></i>Etat:</span> En vente</p>
    </div>

    <div class="box__infos" >
        <h2>
            {{ detail.name }}
        </h2>

        <span>
            <p class="text-grey">
                <i class="bi bi-geo-alt"></i>
                {{ detail.location }}, {{ detail.area }}
            </p>
                </span><br>

        <strong class="price">
            {{  detail.price }}fcfa
        </strong>

        <div class="icons">
            <div class="icon ">
                <i class="fas fa-bed"></i>
                {{ detail.rooms }} chambres
            </div>

            <div class="icon">
                <i class="fas fa-shower"></i>
                {{ detail.bathrooms }} douches
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
        details: [],
        idd: this.id,
        c: 35
    }
  },
  mounted: function(){
    this.getDetails();
  },
  methods:{
    getDetails(c){
        axios.get('http://127.0.0.1/immo/api/item/36').then(
                response =>
                this.details = response.data);
             //   alert(id);
            }


    }
}
</script>