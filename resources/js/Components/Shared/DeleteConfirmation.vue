<template> 
  <JetConfirmationModal
    :show="confirmingItemDeletion"
    @close="confirmingItemDeletion = false"
  >
    <template #title> Delete Item </template>

    <template #content>
     {{message}}
    </template>

    <template #footer>
      <JetSecondaryButton @click="$emit('close')">
        Cancel
      </JetSecondaryButton>

      <JetDangerButton
        class="ml-3"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        @click="[deleteItem(itemToBeDeleted),$emit('close')]"
        
      >
        Delete Item
      </JetDangerButton>
    </template>
  </JetConfirmationModal>
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import JetActionSection from "@/Components/ActionSection.vue";
import JetConfirmationModal from "@/Components/ConfirmationModal.vue";
import JetDangerButton from "@/Components/DangerButton.vue";
import JetSecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
  path: Object,
  item: Object,
  message: String,
  
});
const confirmingItemDeletion = ref(true);

const form = useForm();

function deleteItem(item) {
  form.delete(route(props.path,props.item), {
    errorBag: "deleteItem",
       });
 
  
}
</script>