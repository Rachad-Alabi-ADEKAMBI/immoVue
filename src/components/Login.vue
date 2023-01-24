<template>
        <div class="content">
            <div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 mx-auto mt-30 pt-10 bg-light mt-5 mb-5">
                <div class="login">
                    <form action='./api/api.php?action=login' method="POST">
                        <h1 class="text-center">
                            Connexion
                        </h1>
                        <div class="form-group row">
                            <div class="col-sm-10 mx-auto"><br>
                                <input type="text" class="form-control" id="" name='username'
                                    placeholder="Email/Nom d'utilisateur" value=''>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10 mx-auto">
                                <input type="password" class="form-control" id="" name='pass' placeholder="Mot de passe"
                                    value=''>
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary mx-auto">
                                Connexion
                            </button>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-3 mb-md-0">
                                    <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                    <label class="form-check-label" for="loginCheck"> Se souvenir de moi </label>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Simple link -->
                                <a href="./index.php?action=forgotPassword">Mot de passe oublié ?</a>
                            </div>
                        </div>

                        <!-- Register buttons -->
                        <div class="text-center ">
                            <p class="text-center mx-auto">Pas encore de compte ? <a
                                    href="./index.php?action=register">Inscription</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
        </template>

<script>

    export default {
        name: 'Login',

      data(){
        return{

        }
      },
      mounted: function(){
        //  this.getAds();
      },
      methods:{
        getAds() {
           // alert('ok');
            }
      }
    }
    </script>