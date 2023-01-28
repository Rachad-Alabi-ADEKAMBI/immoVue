<template>
   <div class="container text-center mx-auto buttons fw-bold " v-if="showAddBtn">
            <a href="/dashboard">
                <i class="fas fa-x text-center mx-auto"></i> fermer
            </a>
        <div class="row ">
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

    <div class="container" v-if='showAddAppartment'>
        <div class="row mt-4  mx-auto" >
            <div class="col-sm-12 col-md-9 mx-auto bg-light">
            <form action="./api/api.php?action=addAppartment" method='POST' class="form" enctype="multipart/form-data">
                <div class="close" @click='displayAddBtn()'>
                    <i class="fas fa-x"></i> fermer
                </div> <br>
                <h3 class="text-center">
                    Nouvelle annonce catégorie Appartement
                </h3>
                <hr>
                <div class="form-row mx-auto">
                    <div class="form-group col-md-8">
                        <label for="inputEmail4">Nom: <span class="required">*</span></label>

                        <input type="text" class="form-control" name='name' id="inputEmail4" placeholder=""
                        value=''>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Action: <span class="required">*</span></label>
                        <select type="text" class="form-control" id="inputPassword4" name='action' placeholder=""
                        value=''>
                            <option value="">Veuillez sélectionner</option>
                            <option value="A vendre">A vendre</option>
                            <option value="A louer">A louer</option>
                        </select>
                    </div>
                </div>

                <div class="form-row mx-auto">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Prix: <span class="required">*</span></label>
                        <input type="number" class="form-control" value=''
                        name='price' id="inputEmail4" placeholder="">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Localisation: <span class="required">*</span></label>
                        <select type="text" class="form-control" name='location' id="inputPassword4" placeholder=""
                        value='' required>
                            <option value="">Veuillez selectionner</option>
                            <option value="Bohicon">Bohicon</option>
                            <option value="Cotonou">Cotonou</option>
                            <option value="Calavi">Calavi</option>
                            <option value="Parakou">Parakou</option>
                            <option value="Porto-Novo">Porto Novo</option>

                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Quartier: <span class="required">*</span></label>
                        <input type="text" class="form-control" name='area' id="inputPassword4" placeholder="" value='' required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description: <span class="required">*</span></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" value='' rows="3" name='description'></textarea>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Informations supplémentaires: <span
                            class="required">*</span></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" value=''
                        rows="3" name='more_description'></textarea>
                </div>

                <div class="form-row mx-auto">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Chambres: <span class="required">*</span></label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de chambres à coucher"
                            name='rooms' value='' required onkeyup="if(this.value<0){this.value= this.value * -1}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Salons: <span class="required">*</span></label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de salons"
                            name='living_rooms' value='' required onkeyup="if(this.value<0){this.value= this.value * -1}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Salles de bains: <span class="required">*</span></label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de salles de bains"
                            name='bathrooms' value='' required onkeyup="if(this.value<0){this.value= this.value * -1}">
                    </div>
                </div>

                <div class="form-row mx-auto">
                    <div class="form-group col-sm-4 col-md-4">
                        <label for="inputEmail4">Image 1: <span class="required">*</span></label>
                        <input type="file" class="form-control" id="inputEmail4" name='pic1' required>
                    </div>

                    <div class="form-group col-sm-4 col-md-4">
                        <label for="inputEmail4">Image 2: </label>
                        <input type="file" class="form-control" id="inputEmail4" name='pic2'>
                    </div>

                    <div class="form-group col-sm-4 col-md-4">
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
                        Valider
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="container" v-if="showAddHouse" >
        <div class="row mt-4  mx-auto">
            <div class="col-sm-12 col-md-9 mx-auto bg-light">
            <form action="./api/api.php?action=addHouse" method='POST' class="form" enctype="multipart/form-data">
                <div class="close" @click='displayAddBtn()'>
                    <i class="fas fa-x"></i> fermer
                </div> <br>
                <h3 class="text-center">
                    Nouvelle annonce catégorie Maison
                </h3>
                <hr>
                <div class="form-row mx-auto">
                    <div class="form-group col-md-10">
                        <label for="inputEmail4">Nom: <span class="required">*</span></label>

                        <input type="text" class="form-control" name='name' id="inputEmail4" placeholder=""
                        value=''>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Action: <span class="required">*</span></label>
                        <select type="text" class="form-control" id="inputPassword4" name='action' placeholder=""
                        value=''>
                            <option value="">Veuillez sélectionner</option>
                            <option value="A vendre">A vendre</option>
                            <option value="A louer">A louer</option>
                        </select>
                    </div>
                </div>

                <div class="form-row mx-auto">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Prix: <span class="required">*</span></label>
                        <input type="number" class="form-control" value='' name='price' id="inputEmail4" placeholder="">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Localisation: <span class="required">*</span></label>
                        <select type="text" class="form-control" name='location' id="inputPassword4"
                        placeholder="" value='' required>
                            <option value="">Veuillez selectionner</option>
                            <option value="Bohicon">Bohicon</option>
                            <option value="Cotonou">Cotonou</option>
                            <option value="Calavi">Calavi</option>
                            <option value="Parakou">Parakou</option>
                            <option value="Porto-Novo">Porto Novo</option>

                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Quartier: <span class="required">*</span></label>
                        <input type="text" class="form-control" name='area' id="inputPassword4"
                        placeholder="" value='' required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description: <span class="required">*</span></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1"
                    rows="3" name='description'></textarea>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Informations supplémentaires: <span
                            class="required">*</span></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" value=''
                    rows="3" name='more_description'></textarea>
                </div>

                <div class="form-row mx-auto">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Chambres: <span class="required">*</span></label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de chambres à coucher"
                            name='rooms' value='' required onkeyup="if(this.value<0){this.value= this.value * -1}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Salons: <span class="required">*</span></label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de salons"
                            name='living_rooms'>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Salles de bains: <span class="required">*</span></label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de salles de bains"
                            name='bathrooms'  required onkeyup="if(this.value<0){this.value= this.value * -1}">
                    </div>
                </div>

                <div class="form-row mx-auto">
                    <div class="form-group col-sm-4 col-md-4">
                        <label for="inputEmail4">Image 1: <span class="required">*</span></label>
                        <input type="file" class="form-control" id="inputEmail4" name='pic1' required>
                    </div>

                    <div class="form-group col-sm-4 col-md-4">
                        <label for="inputEmail4">Image 2: </label>
                        <input type="file" class="form-control" id="inputEmail4" name='pic2'>
                    </div>

                    <div class="form-group col-sm-4 col-md-4">
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
                        Valider
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="container" v-if="showAddLand">
        <div class="row mt-4  mx-auto">
           <div class="col-sm-12 col-md-9 mx-auto bg-light">
        <form action="./api/api.php?action=addLand" method='POST' class="form" enctype="multipart/form-data">
            <div class="close" @click='displayAddBtn()'>
                <i class="fas fa-x"></i> fermer
            </div> <br>
            <h3 class="text-center">
                Nouvelle annonce catégorie Terrain
            </h3>
            <hr>
            <div class="form-row mx-auto">
                <div class="form-group col-md-8">
                    <label for="inputEmail4">Nom: <span class="required">*</span></label>

                    <input type="text" class="form-control" name='name' id="inputEmail4"
                    placeholder="" value=''>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputPassword4">Action: <span class="required">*</span></label>
                    <select type="text" class="form-control" id="inputPassword4" name='action'
                    placeholder="" value=''>
                        <option value="">Veuillez sélectionner</option>
                        <option value="A vendre">A vendre</option>
                        <option value="A louer">A louer</option>
                    </select>
                </div>
            </div>

            <div class="form-row mx-auto">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Prix: <span class="required">*</span></label>
                    <input type="number" class="form-control" value=''
                     name='price' id="inputEmail4" placeholder="">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputPassword4">Localisation: <span class="required">*</span></label>
                    <select type="text" class="form-control" name='location' id="inputPassword4"
                     placeholder="" value='' required>
                        <option value="">Veuillez selectionner</option>
                        <option value="Bohicon">Bohicon</option>
                        <option value="Cotonou">Cotonou</option>
                        <option value="Calavi">Calavi</option>
                        <option value="Parakou">Parakou</option>
                        <option value="Porto-Novo">Porto Novo</option>

                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputPassword4">Quartier: <span class="required">*</span></label>
                    <input type="text" class="form-control" name='area' id="inputPassword4" placeholder=""
                    value='' required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description: <span class="required">*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" value=''
                 rows="3" name='description'></textarea>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Informations supplémentaires: <span
                        class="required">*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" value=''
                rows="3" name='more_description'></textarea>
            </div>

            <div class="form-row mx-auto">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Superficie en m2: <span class="required">*</span></label>
                    <input type="number" class="form-control" id="inputEmail4" name='size' value=''
                     required onkeyup="if(this.value<0){this.value= this.value * -1}">
                </div>
            </div>

            <div class="form-row mx-auto">
                <div class="form-group col-sm-4 col-md-4">
                    <label for="inputEmail4">Image 1: <span class="required">*</span></label>
                    <input type="file" class="form-control" required id="inputEmail4" name='pic1'>
                </div>

                <div class="form-group col-sm-4 col-md-4">
                    <label for="inputEmail4">Image 2: </label>
                    <input type="file" class="form-control" id="inputEmail4" name='pic2'>
                </div>

                <div class="form-group col-sm-4 col-md-4">
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
                    Valider
                </button>
            </div>
        </form>
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