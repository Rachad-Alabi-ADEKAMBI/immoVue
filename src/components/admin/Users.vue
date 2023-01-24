<template>
   <div class="container" v-if='showAll'>
        <div class="row text-center">
            <div class="search mx-auto pt-2">
                <label for="">Recherche par mot clé <br>
                    <input type="text">
                </label>
            </div>
        </div>
        <div class="row" >
            <div class="col-sm-12 col-md-10 mx-auto mt-3">
                <div class="table-responsive-md">
                    <h1 class="text-center">
                        Liste des utilisateurs
                    </h1>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Annonces</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label='Nom'>
                                        user 1
                                </td>

                                <td data-label='Id' scope="row">
                                    <img src="/src/assets/img/profil.jpeg" alt="" class="table-img">
                                </td>
                                <td data-label='Action'>
                                    ghjhjbjh
                                </td>
                                <td data-label='Prix'>
                                    10 annonces
                                </td>
                                <td>
                                    <i class="fas fa-eye" ></i>
                                    <i class="fas fa-trash" @click='deleteUser()'></i>
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
                </p>

                <div class="form-group row">
                            <div class="col-sm-10 mx-auto"><br>
                                <input type="text" class="form-control" id="" name='reason'
                                placeholder="Motif de suppression" value=''>
                            </div>
                        </div> <br>

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
      name: 'Users',

  data(){
        return{
            showAll : true,
        showDelete : false,
        }
  },
  mounted: function(){
    this.displayAll();
  },
  methods:{
    displayAll(){
        this.showAll = true;
        this.showDelete = false
    },
    deleteUser(){
        this.showAll = false;
        this.showDelete = true
    }
  }
}
</script>