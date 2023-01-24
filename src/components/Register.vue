<template>
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-sm-12 col-md-6 mx-auto bg-light p-3">
                <form class="needs-validation" action='./api/api.php?action=register' enctype="multipart/form-data"
                    method='POST'>
                    <h2>
                        Création de compte
                    </h2>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Email</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Email" name='email'
                                value='' required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Prénoms:</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Prénoms"
                                name='first_name' value='' required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Nom:</label>
                            <input type="text" class="form-control" id="validationCustom02" value='' placeholder="Nom" name='last_name' required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3">
                            <label for="validationCustom01">Indicatif</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="" name='phone_code'
                                value='' onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                        </div>
                        <div class="col-9">
                            <label for="validationCustom02">Num de tél <span class="red">*</span> </label>
                            <input type="number" class="form-control" id="validationCustom02" placeholder="" name='phone_number'
                                value='' onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-6">
                            <label for="validationCustom01">Photo</label>
                            <input type="file" class="form-control" id="validationCustom01" placeholder="" name=' pic' required>
                        </div>
                    </div>
                    <hr>

                    <div class="form-row">
                        <div class="col-6 ">
                            <label for="validationCustom01">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Nom d'utilisateur"
                                name='username' required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-6">
                            <label for="validationCustom01">Mot de passe</label>
                            <input type="password" class="form-control" id="validationCustom01" placeholder="Mot de passe"
                                name='password1' required>
                        </div>
                        <div class="col-6">
                            <label for="validationCustom02">Confirmez mot de passe</label>
                            <input type="password" class="form-control" id="validationCustom02"
                                placeholder="Confirmez le mpt de passe" value="" name='password2' required>
                        </div>
                    </div>



                    <div class="form-group mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Oui j'ai lu et j'accepte <a href="./index.php?action=cgu">les CGV</a>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Inscription</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import Box from './Box.vue'
    import Tags from './Tags.vue'

        export default {
            name: 'Register',
            components: {
        Box,
        Tags
      },

          data(){
            return{
                ads:[],
                parentMessage: 'Hello from the parent component!'
            }
          },
          mounted: function(){
         //     this.getAds();
          },
          methods:{
            getAds() {
               // alert('ok');
                }
          }
        }
        </script>