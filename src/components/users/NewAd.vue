<template>
   <div class="container text-center mx-auto buttons fw-bold ">
        <div class="close text-center">
            <a href="/dashboard">
                <i class="fas fa-x text-center mx-auto"></i> fermer
            </a>
        </div><br>
        <div class="row " >
            <h2 class="text-center">
                Nouvelle annonce
            </h2> <br>

            <div class="buttons">
                <button class='btn btn-primary' @click='displayAddHouse()'>
                    Maison
                </button>
                <button class='btn btn-primary' @click='displayAddAppartment()'>
                    Appartement
                </button>

                <button class='btn btn-primary' @click='displayAddLand()'>
                    Terrain
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'NewAd',
props: {
// message: ''
},
data(){
return{
    showAddBtn: false,
    showAddHouse: false,
    showAddAppartment: false,
    showAddLand: false
}
},
mounted: function(){
    this.displayAddBtn();
},
methods: {
        displayAddBtn(){
                alert('ok');
                this.showAddBtn = true;
                this.showAddHouse = false;
                this.showAddAppartment = false;
                this.showAddLand = false;
        },
        displayAddHouse(){
                this.showAddBtn = false;
                this.showAddHouse = true;
                this.showAddAppartment = false;
                this.showAddLand = false;
        },
        displayAddAppartment(){
                this.showAddBtn = false;
                this.showAddHouse = false;
                this.showAddAppartment = true;
                this.showAddLand = false;
        },
        displayAddLand(){
                this.showAddBtn = false;
                this.showAddHouse = false;
                this.showAddAppartment = false;
                this.showAddLand = true;
        },
        format(num){
            let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 2 }).format(num);
            return res;
    },
    convert(date){
                    function addDaysToDate(date, days){
                            var res = new Date(date);
                            res.setDate(res.getDate() + days);
                            return res;
                        }
                         date_formated = addDaysToDate(date, 0);
                         return date_formated.toLocaleDateString('fr');
        }
  }


}

</script>