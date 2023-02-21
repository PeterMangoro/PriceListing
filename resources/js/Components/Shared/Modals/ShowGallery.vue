<template>
  <gallery-modal
    :show="confirmingItemDeletion"
    @close="confirmingItemDeletion = false"
  >

    <template #content>
      <gallery
        :images="images"
       
      />
    
    </template>

    <template #footer>
      <JetSecondaryButton @click="$emit('close')"> Close </JetSecondaryButton>

      
    </template>
  </gallery-modal>
</template>
<script setup>
import { ref } from "vue";
import JetActionSection from "@/Components/ActionSection.vue";
import GalleryModal from "@/Components/Shared/Modals/GalleryModal.vue";
import JetSecondaryButton from "@/Components/SecondaryButton.vue";
import { router } from "@inertiajs/vue3";
import Gallery from "@/Components/Shared/Gallery/Gallery.vue";

const props = defineProps({
 
  images: Object,
});
const confirmingItemDeletion = ref(true);

function deleteItem(item) {
  router.delete(route(props.path, props.item), {
    errorBag: "deleteItem",
  });
}
</script>