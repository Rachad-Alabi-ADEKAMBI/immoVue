<template>
    <div class="">
     <div class="tags ">
                     <div class="tags__heading text-center">
                         <p class="span">
                             <i class="fas fa-list"></i> Type de biens
                         </p>
                     </div>
                     <hr>

                     <div class="tags__body text-center">
                         <div class="tag">
                             <router-link to="/appartments" >
                                 <i class="bi bi-building"></i>  Appartments
                              </router-link>
                         </div>

                         <hr>
                         <div class="tag">
                             <router-link to="/houses" >
                                 <i class="bi bi-house"></i> Maisons
                              </router-link>
                         </div>

                         <hr>

                         <div class="tag">
                             <router-link to="/lands" >
                                 <i class="bi bi-signpost"></i> Terrains
                              </router-link>
                         </div>

                         <hr>
                     </div>
     </div>

     <br>

     <div class="tags ">
         <div class="tags__heading text-center">
                         <p class="span">
                             <i class="bi bi-geo-alt"></i> Localités
                         </p>
                     </div>
                     <hr>

                     <div class="tags__body text-center">
                         <div class="tag">
                             <router-link to="/location?location=Bohicon" >
                                 <i class="bi bi-arrow-right"></i>Bohicon
                              </router-link>
                         </div>

                         <hr>
                         <div class="tag">
                             <router-link to="/location?location=Calavi" >
                                 <i class="bi bi-arrow-right"></i> Calavi
                              </router-link>
                         </div>

                         <hr>

                         <div class="tag">
                             <router-link to="/location?location=Cotonou" >
                                 <i class="bi bi-arrow-right"></i> Cotonou
                              </router-link>
                         </div>

                         <hr>

                         <div class="tag">
                             <router-link to="/location?location=Porto-Novo" >
                                 <i class="bi bi-arrow-right"></i> Porto-Novo
                              </router-link>
                         </div>

                         <hr>
                         <div class="tag">
                             <router-link to="/location?location=Parakou" >
                                 <i class="bi bi-arrow-right"></i> Parakou
                              </router-link>
                         </div>
                     </div>
     </div>
    </div>
 </template>

 <script>
 export default {
       name: 'Tags',
   props: {
    // message: ''
   }
 }
 </script>