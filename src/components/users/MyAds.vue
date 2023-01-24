<template>
    <div class="container"  v-if='showAll'>
        <div class="row text-center">
            <div class="search mx-auto pt-2">
                <label for="">Recherche par mot clé <br>
                    <input type="text">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-10 mx-auto mt-3">
                <div class="table-responsive-md">
                    <h1 class="text-center">
                        Mes annonces
                    </h1>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Image</th>
                                <th scope="col">Date</th>
                                <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label='Nom'>
                                        article 1
                                </td>

                                <td data-label='Id' scope="row">
                                    <img src="/assets/img/maison3.jpg" alt="" class="table-img">
                                </td>
                                <td data-label='Action'>
                                    LOuer
                                </td>
                                <td data-label='Prix'>
                                    F CFA
                                </td>
                                <td>
                                    <i class="fas fa-eye" @click='viewOnline()'></i>
                                    <i class="fas fa-trash" @click='deleteAd()'></i>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container" v-if="showDelete">
    <div class="row">
       <div class="col-sm-12 col-md-6 mx-auto">
        <form action="" class="bg-light">
            <div class="form__close text-left">
                <i class="bi bi-x"></i>
            </div>
            <p class="text-center">
                Confirmez vous cette suppression ?
            </p> <br>

           <div class="buttons">
                <label for="">
                    <button class="btn btn-green">
                        Oui
                    </button>
                </label>

                <label for="">
                    <button class="btn btn-red" @click="displayAll()">
                        Non
                    </button>
                </label>
           </div>
        </form>
       </div>
    </div>
    </div>
</template>

<script>
export default {
  name: 'MyAds',
props: {
// message: ''
},
data(){
return{
    ads: [],
    showAll: false,
    showDelete: false
}
},
mounted: function(){
    this.displayAll();
},
methods: {
displayAll(){
      /*  axios.get('https://127.0.0.1/rapidnote/api/users').then(
                response =>
                this.userss = response.data);
                */
this.showAll = true;
this.showDelete = false;
},
deleteAd(){
    this.showAll = false;
this.showDelete = true;
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