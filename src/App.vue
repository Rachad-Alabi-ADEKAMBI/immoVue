<template class="main">

<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img src="http://immobilierbenin.com/public/img/logo-transparent.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                <router-link to="/" class="nav-link" >
                Accueil <span class="sr-only">(current)</span>
                </router-link>

                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/ads" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Annonces
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/appartments">Appartements</a>
                        <a class="dropdown-item" href="/houses">Maisons</a>
                        <a class="dropdown-item" href="/lands">Terrains</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/ads">Tout voir</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/sellers">Annonceurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">A propos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>

                <!--
                <li class="nav-item">
                    <a class="nav-link" href="/dashboardAdmin">Tableau adm</a>
                </li>

                <li class="nav-item">
                    <router-link to="/dashboard" class="nav-link" >
                        Tableau de bord
                    </router-link>
                </li>



                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>  -->
            </ul>
            <div class="form-inline my-2 my-lg-0">

                <button class="btn btn-primary my-2 " type="submit">
                    <router-link to="/login" >Connexion     </router-link>
                </button>
            </div>
        </div>
    </nav>
</div>

  <div class="content">
    <router-view/>
  </div>

  <footer class="footer bg-liwght mt-5">
    <div class=" container bg-light">
        <div class="row pt-3 text-left">
            <div class="col-sm-12 col-md-4">
                <img src="http://immobilierbenin.com/public/img/logo-transparent.png" alt=""> <br>

                <p>
                    <i class="fas fa-envelope"></i>
                    contact@immobilierbenin.com
                </p>
            </div>

            <div class="col-sm-12 col-md-4">
                <h3>CATEGORIES</h3>

                <p>
                    <a href="/appartments" class="">
                        <i class="bi bi-building"></i> Appartements
                    </a>
                    <br>
                    <a href="/houses" class="">
                        <i class="bi bi-house"></i> Maisons
                    </a> <br>
                    <a href="/lands" class="">
                        <i class="bi bi-signpost"></i> Terrains
                    </a> <br>

                    <a href="/ads" class="">
                        <i class="fas fa-arrow-right"></i> Tout voir
                    </a>

                </p>
            </div>

            <div class="col-sm-12 col-md-4 ml-0 text-left">
                <p> <h3 class=" ml-0 text-left">LIENS </h3>


                    <a href="/about" class="">
                        <i class="fas fa-arrow-right"></i> A-propos
                    </a> <br>
                    <a href="/contact">
                        <i class="fas fa-arrow-right"></i> Contact
                    </a><br>
                    <a href="/cgu">
                        <i class="fas fa-arrow-right"></i> CGU
                    </a>

                </p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-6">
                <p>2022 ImmobilierBenin - Tous droits réservés</p>
            </div>

            <div class="col-6">
                <a href="#app">
                    <div class="up">

                        <i class="fas fa-caret-up"></i>

                    </div>
                </a>
            </div>

        </div>
    </div>
</footer>
</template>

<script>

export default {
  name: '',
props: {


},
data(){
return{
   // logged: 'yes'
}
},
mounted: function(){
    //this.displayAll();
},
methods: {
displayAll(id){
        axios.get('https://127.0.0.1/immo/api/myAds/2').then(
                response =>
                this.ads = response.data);
this.showAll = true;
this.showDelete = false;
this.showEdit = false;
},
  }


}

</script>
