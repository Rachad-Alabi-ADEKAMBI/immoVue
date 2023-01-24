<template>
    <div class="tags bg-light">
                    <div class="tags__heading text-center pt-2">
                        <span>
                            Type de biens
                        </span>
                    </div>
                    <hr>

                    <div class="tags__body text-center">
                        <div class="tag">
                            <router-link to="/appartments" >
                                <i class="bi bi-arrow-right"></i>Appartments
                             </router-link>
                        </div>

                        <hr>
                        <div class="tag">
                            <router-link to="/houses" >
                                <i class="bi bi-arrow-right"></i> Maisons
                             </router-link>
                        </div>

                        <hr>

                        <div class="tag">
                            <router-link to="/lands" >
                                <i class="bi bi-arrow-right"></i> Terrains
                             </router-link>
                        </div>

                        <hr>
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