<template>
    <div class="container">
        <div class="row">
            <form class="needs-validation" action='./api/api.php?action=parameters' enctype="multipart/form-data"
            method='POST'>
            <h2>
                Paramètres
            </h2>

            <div class="form-row">
                <div class="col-6 ">
                    <label for="validationCustom01">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Nom d'utilisateur"
                        name='username'>
                </div>
            </div> <br>

            <div class="form-row">
                <div class="col-6">
                    <label for="validationCustom01">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="validationCustom01" placeholder="Mot de passe"
                        name='pass1'>
                </div>
                <div class="col-6">
                    <label for="validationCustom02">Confirmez mot de passe</label>
                    <input type="password" class="form-control" id="validationCustom02"
                        placeholder="Confirmez le mot de passe" value="" name='pass2'>
                </div>
            </div> <br>

            <button class="btn btn-primary" type="submit">Changer</button>
        </form>
        </div>
    </div>
</template>



<script>
export default {
      name: 'Settings',
  props: {
   // message: ''
  }
}
</script>