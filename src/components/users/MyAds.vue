<template>
    <div class="container" v-if="showSearch">
        <div class="row" >
                <div class="search-bar">
                    <label for="">Recherche par mot clé  <i class="bi bi-x bold" @click="closeSearch()"></i><br>
                        <input type="text" v-model="searchKey">
                    </label>
                </div> <br>

                <div class="list">
                                <div class="">
                                    <h3 class="text-center">Nom et prenoms</h3>
                                    <ul>
                                        <li v-for="ad in filteredItems" :key="ad.id">
                                            {{ ad.id }}
                                        </li>
                                    </ul>

                                </div>



                                <div class="" v-if='filteredItems.length === 0'>
                                    <p class="text-center pt-5 mt-5">
                                        Aucun résultat
                                    </p>
                                </div>
                </div>
        </div>
    </div>


    <div class="container"  v-if='showAll'>
            <div class="row" >
                <div class="col-9">
                            <h1 class="text-blue text-left">
                                Mes annonces
                            </h1>
                    </div>

                    <div class="col-3 text-left search-icon" @click="displaySearch()" v-if="showSearchBtn">
                                <i class="bi bi-search"></i>
                                <p class="text text-grey">Chercher</p>
                    </div>
            </div>
        <div class="row">
            <div class="col-sm-12 col-md-10">
                <div class="table-responsive-md">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Image</th>
                                <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="ad in ads" :key="ad.id">
                                <td data-label='Nom'>
                                        {{ ad.id }}
                                </td>
                                <td data-label='Nom'>
                                        {{ ad.name }}
                                </td>

                                <td data-label='Id' scope="row">
                                    <img :src='getImgUrl(ad.pic1)'   alt="" class="table-img">
                                </td>
                                <td data-label='Prix'>
                                 {{ format(ad.price) }} XOF
                                </td>
                                <td>
                                    <i class="fas fa-eye" @click='viewOnline(ad.id)'></i>
                                    <i class="fas fa-pen" @click='editAd(ad.id)'></i>
                                    <i class="fas fa-trash" @click='deleteAd(ad.id)'></i>
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
            <div class="form__close text-left" @click="displayAll()">
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

    <div class="container" v-if="showEdit">
        <div class="row">
            <div class="col-sm-12 col-md-9 ml-0 bg-light">
                <form action="./api/api.php?action=editItem" method='POST' class="bg-light" enctype="multipart/form-data">
            <div class="close text-left" @click='displayAll()' v-for="detail in details" :key="detail.id">
                <i class="bi bi-x" ></i>
            </div> <br>
            <h3 class="text-center">
                Editer annonce {{ detail.id }}
            </h3>
            <hr>
            <div class="form-row mx-auto">
                <div class="form-group col-md-8">
                    <label for="inputEmail4">Nom: <span class="required">*</span></label>

                    <input type="text" class="form-control" name='name' id="inputEmail4" placeholder="" value=''>
                </div>
            </div>

            <div class="form-row mx-auto">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Prix: <span class="required">*</span></label>
                    <input type="number" class="form-control" value='' name='price' id="inputEmail4" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description: <span class="required">*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" value='' rows="3" name='description'></textarea>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Informations supplémentaires: <span
                        class="required">*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" value='' rows="3" name='more_description'></textarea>
            </div>


            <div class="form-row mx-auto">
                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                    <label for="inputEmail4">Image 1: <span class="required">*</span></label>
                    <input type="file" class="form-control" required id="inputEmail4" name='pic1'>
                </div>

                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                    <label for="inputEmail4">Image 2: </label>
                    <input type="file" class="form-control" id="inputEmail4" name='pic2'>
                </div>

                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                    <label for="inputEmail4">Image 3: </label>
                    <input type="file" class="form-control" id="inputEmail4" name='pic3'>
                </div>


            </div>

            <div class="form-row mx-auto">
                <div class="form-group col-sm-4 col-md-3">
                    <label for="inputEmail4">Image 4: </label>
                    <input type="file" class="form-control" id="inputEmail4" name='pic4'>
                </div>

                <div class="form-group col-sm-4 col-md-3">
                    <label for="inputEmail4">Image 5: </label>
                    <input type="file" class="form-control" id="inputEmail4" name='pic5'>
                </div>

                <div class="form-group col-sm-4 col-md-3">
                    <label for="inputEmail4">Image 6: </label>
                    <input type="file" class="form-control" id="inputEmail4" name='pic6'>
                </div>

                <div class="form-group col-sm-4 col-md-3">
                    <label for="inputEmail4">Image 7: </label>
                    <input type="file" class="form-control" id="inputEmail4" name='pic7'>
                </div>
            </div>

            <div class="form-group col-sm-4 col-md-3 mx-auto">
                <button class="btn btn-primary" type='submit'>
                    Modifier
                </button>
            </div>
        </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  name: 'MyAds',
props: {


},
data(){
return{
    ads: [],
    details: [],
    showAll: false,
    showDelete: false,
    showEdit: false,
    showSearchBtn: true,
        showSearch: false,
        searchKey: '',
        id: 2
}
},
mounted: function(){
    this.displayAll();
},
computed: {
            filteredItems() {
                return this.ads.filter(ad => {
                    return ad.searchKey.toLowerCase().includes(this.searchKey.toLowerCase());
                })
            }
        },
methods: {
displayAll(){
        axios.get('https://127.0.0.1/immo/api/myAds').then(
                response =>
                this.ads = response.data);
this.showAll = true;
this.showDelete = false;
this.showEdit = false;
},
displaySearch(){
    this.showSearchBtn = false;
    this.showSearch = true;
    this.showAll = false;
},
closeSearch(){
    this.showSearchBtn = true;
    this.showSearch = false;
    this.showAll = true;
},
deleteAd(){
    axios.get('https://127.0.0.1/immo/api/item/2').then(
                response =>
                this.details = response.data);
    this.showAll = false;
    this.showDelete = true;
    this.showEdit = false;
},
editAd(id){
    axios.get('http://127.0.0.1/immo/api/item/25').then(
                response =>
                this.details = response.data);
    this.showAll = false;
    this.showDelete = false;
    this.showEdit = true;
},
format(num){
            let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 2 }).format(num);
            return res;
    },
    getImgUrl(pic) {
    return "http://127.0.0.1/immo/src/assets/img/" + pic;
},

    convert(date){
                    function addDaysToDate(date, days){
                            var res = new Date(date);
                            res.setDate(res.getDate() + days);
                            return res;
                        }
                         date_formated = addDaysToDate(date, 0);
                         return date_formated.toLocaleDateString('fr');
        },
        viewOnline(id){
            this.$router.push('/item/'+id);
        }
  }


}

</script>