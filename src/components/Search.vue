<template>
      <div class="container">
        <div class="row">
            <form action="api/api.php?action=search" method="POST">
                <div class="row mx-auto search ">
                                <div class="col-sm-12 col-md-3 search__item">
                                    <label for="" class="">
                                        <select name="type" id="" placeholder='Type de bien' required>
                                            <option value="">Type de bien</option>
                                            <option value="Appartement">Appartement</option>
                                            <option value="Maison">Maison</option>
                                            <option value="Terrains">Terrain</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-3 search__item">
                                    <label for="" class="">
                                        <select name="action" id="" placeholder="Type d'annonce" required>
                                            <option value="">Type d'annonce</option>
                                            <option value="A vendre">A vendre</option>
                                            <option value="A louer">A louer</option>
                                            <option value="all">Tous</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="col-sm-12 col-md-3 search__item">
                                    <label for="" class="">
                                        <select name="location" id="" placeholder='Ville' required>
                                            <option value="">Ville</option>
                                            <option value="Bohicon">Bohicon</option>
                                            <option value="Cotonou">Cotonou</option>
                                            <option value="Calavi">Calavi</option>
                                            <option value="Porto-Novo">Porto-Novo</option>
                                            <option value="Parakou">Parakou</option>
                                            <option value="all">Toutes les villes</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="col-sm-12 col-md-3 search__item">
                                    <label for="">
                                        <button type='submit' class="btn">
                                            Rechercher
                                        </button>
                                    </label>
                                </div>

                </div>
            </form>
        </div>
      </div>
</template>


<script>

  export default {
      name: 'Search',
      components: {

},

    data(){
      return{
          ads:[],
          parentMessage: 'Hello from the parent component!',
          id: ''
      }
    },
    methods:{
      getAds() {

          },
          getImgUrl(pic) {
  return "https://immobilierbenin.com/public/img/" + pic;
},
format(num){
  let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
  return res;

}

    }
  }
  </script>

