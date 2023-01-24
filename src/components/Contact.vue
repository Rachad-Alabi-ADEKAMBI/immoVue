<template>
    <section class="section">
    <div class="container">
        <div class="row contact__item mx-auto">
            <div class="col-sm-12 col-md-5 contact-box mx-auto">
                <h1 class="text-center mx-auto">
                    NOUS CONTACTER
                </h1> <br>

                <img src="" class='w-10' alt=""> <br>

                <span>
                    Lelouch, Directeur general
                </span>

                <p class="fw-light">"Confiez nous vos locations et vente, nous nous occupons de
                    tout. Contactez nous également pour vos recherches de biens immobilier"
                </p>
            </div>

            <div class="col-sm-12 col-md-5 contact-box">
                <ul>

                    <li>
                        <i class="fas fa-phone-volume"></i>
                        55 00 00 00
                    </li>
                    <li>
                        <i class="fab fa-whatsapp"></i>
                        55 00 00 00

                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        contact@immobilierbenin.com
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row contact__item ">
        <div class="col-sm-10 col-md-7 mx-auto bg-light">
            <form class="form" method='POST' action='./api/api.php?action=contact'>
                <div class="form-group">
                    <label for="inputAddress">Email: </label> <span class="red">*</span>
                    <input type="Email" class="form-control" id="inputAddress" placeholder="Email" name='email'
                        required>
                </div>
                <div class="form-row mx-auto">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nom: </label> <span class="red">*</span>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nom" name='first_name'
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Prénoms:</label><span class="red">*</span>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Prénoms" required
                            name='last_name'>
                    </div>
                </div>

                <div class="form-row mx-auto mt-2">
                    <div class="form-group  col-4">
                        <label for="inputEmail4">Indicatif : </label> <span class="red">*</span>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Indicatif de téléphone"
                            onkeyup="if(this.value<0){this.value= this.value * -1}" name='phone_code'>
                    </div>
                    <div class="form-group  col-8">
                        <label for="inputPassword4">Num de téléphone: </label> <span class="red">*</span>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Numéro de téléphone"
                            name='phone_number' onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                    </div>
                </div>

                <div class="form-row mx-auto mt-2">
                    <div class="form-group col-md-6">
                        <label for="">Département: </label> <span class="red">*</span> <br>
                        <select name="branch" id="">
                            <option value="">Veuillez sélectionner</option>
                            <option value="admin">Administratif</option>
                            <option value="tech">Support technique</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Objet: </label> <span class="red">*</span> <br>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Objet du message"
                            name='subject' required>

                    </div>
                </div>





                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <p class="text-left">
                    (Les cases obligatoires sont précédées de <span class="red">*</span>)
                </p>

                <div class="form-group mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Oui je comprends et j'accepte que ces informations soient <br> stockées
                            afin de me recontacter
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</section>
</template>



<script>

    export default {
        name: 'Contact',
        components: {
  },

      data(){
        return{

        }
      },
      mounted: function(){

      },
      methods:{

      }
    }
    </script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
