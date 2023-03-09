<template>
    <div class="col-12 box" v-for="detail in details" :key="detail.id">
    <div class="box__img">
        <img :src='getImgUrl(detail.pic1)'>
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
            {{  format(detail.price) }} XOF
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
                {{ detail.kitchens }} cuisine
            </div>

            <div class="icon">
                <i class="bi bi-tv"></i>
                {{detail.living_rooms  }} salon
            </div>

            <div class="icon">
                <i class="fas fa-warehouse"></i>
                {{detail.living_rooms  }} magasins
            </div>

            <div class="icon">
                <i class="fas fa-layer-group"></i>
                {{detail.area  }} m²
            </div>
            <div class="icon">
                                            <i class="bi bi-car-front"></i>
                                            {{detail.parkings  }} parking
                                      </div>
        </div>

        <button class="btn btn-primary">
            <a v-bind:href="'/item?id='+ detail.id">
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
    parentMessage: '',
    details: [
        {id: '1', name:'appartement 1', rooms: '3', bathrooms: '2', parking: '1', pic1: 'home1.jpeg', price: '150000', }
    ]
  },
  data(){
    return{
        details: []
    }
  },
  mounted: function(){
    this.getDetails();
  },
  methods:{

    getDetails(){
            axios.get(`https://api.adekambirachad.com/api/V1/ad/1`)
  .then(response => (this.details = response.data))
  .catch(error => console.log(error))
            },
            format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;

},
            getImgUrl(pic) {
    return "https://immobilierbenin.com/assets/img/" + pic;
}


    }
}
</script>