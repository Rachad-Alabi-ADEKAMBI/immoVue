<template class="main">

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./index.php"><img src="./assets//img/logo-immo.png" alt=""></a>
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
                    <a class="dropdown-item" href="./index.php?action=appartments">Appartements</a>
                    <a class="dropdown-item" href="./index.php?action=houses">Maisons</a>
                    <a class="dropdown-item" href="./index.php?action=lands">Terrains</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/">Tout voir</a>
                </div>
            </li>

            <li class="nav-item">
                <router-link to="/contact" class="nav-link" >
                     Contact
                </router-link>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="/dashboardAdmin">Tableau adm</a>
            </li>

            <li class="nav-item">
                <router-link to="/dashboard" class="nav-link" >
                     Tableau user
                </router-link>
            </li>



            <!--  <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>  -->
        </ul>
        <form class="form-inline my-2 my-lg-0">

            <button class="btn my-2 " type="submit">
                <router-link to="/login" >Login     </router-link>
            </button>

            <button class="btn btn-outline-success m-2" type="submit">
                <a href="./api/api.php?action=logout">
                    Déconnexion
                </a>
            </button>
        </form>
    </div>
</nav>
</div>

  <div class="content">
    <router-view/>
  </div>

  <footer class="footer bg-light mt-5">
    <div class="container bg-light">
        <div class="row pt-3">
            <div class="col-sm-12 col-md-3">
                <h3>CONTACTS</h3>

                <p>
                    <i class="fas fa-phone-volume"></i>
                    55 00 00 00
                    <br>
                    <i class="fab fa-whatsapp"></i>
                    55 00 00 00
                    <br>
                    <i class="fas fa-envelope"></i>
                    contact@immobilierbenin.com
                </p>
            </div>

            <div class="col-sm-12 col-md-3">
                <h3>CATEGORIES</h3>

                <p>
                    <a href="/appartments" class="">
                        <i class="fas fa-arrow-right"></i> Appartements
                    </a>
                    <br>
                    <a href="/houses" class="">
                        <i class="fas fa-arrow-right"></i> Maisons
                    </a> <br>
                    <a href="/lands" class="">
                        <i class="fas fa-arrow-right"></i> Terrains
                    </a> <br>

                    <a href="/ads" class="">
                        <i class="fas fa-arrow-right"></i> Tout voir
                    </a>

                </p>
            </div>

            <div class="col-sm-12 col-md-3">
                <h3>LIENS UTILES</h3>

                <p>
                    <a href="./index.php#about" class="">
                        <i class="fas fa-arrow-right"></i> A-propos
                    </a> <br>
                    <a href="./index.php?action=contact">
                        <i class="fas fa-arrow-right"></i> Contact
                    </a><br>
                    <a href="./index.php?action=cgu">
                        <i class="fas fa-arrow-right"></i> CGV
                    </a>

                </p>
            </div>

            <div class="col-sm-12 col-md-3">
                <h3 class="text-left">
                    Newsletters
                </h3>
                <div class="row">
                    <form action="index.php?action=registerToNewsletters" method="POST">
                        <div class="col-6">
                            <label for=""></label>
                            <input type="email" name='email' required>
                        </div>

                        <div class="col-6">
                            <label for=""></label><br>
                            <button class='btn btn-primary' type="submit">
                                M'abonner
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-6">
                <p>2022 ImmobilierBenin - Tous droits réservés</p>
            </div>

            <div class="col-6">
                <a href="#main">
                    <div class="up">

                        <i class="fas fa-caret-up"></i>

                    </div>
                </a>
            </div>

        </div>
    </div>
</footer>


</template>
