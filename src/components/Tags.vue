<template>
    <div class="tags">
                    <div class="tags__heading text-center">
                        <span>
                            Type de biens
                        </span>
                    </div>

                    <div class="tags__body text-center">


                        <div class="tag">
                            <a href="index.php?action=appartments">
                                <i class="bi bi-arrow-right"></i> Appartements
                            </a>
                            <hr>
                        </div>

                        <div class="tag">
                            <a href="">
                                <i class="bi bi-arrow-right"></i> Maisons
                            </a>
                            <hr>
                        </div>

                        <div class="tag">
                            <a href="">
                                <i class="bi bi-arrow-right"></i> Terrains
                            </a>
                            <hr>
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