<template> 
  <check-out-modal
    :show="confirmingItemDeletion"
    @close="confirmingItemDeletion = false"
  >
    <template #title> Confirm Checking Out </template>

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
        @click="[checkOut(itemToBeDeleted),$emit('close')]"
        
      >
        Check-Out
      </JetDangerButton>
    </template>
  </check-out-modal>
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import JetActionSection from "@/Components/ActionSection.vue";
import CheckOutModal from "@/Components/Shared/Room/CheckOutModal.vue"
import JetDangerButton from "@/Components/DangerButton.vue";
import JetSecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
  path: Object,
  item: Object,
  message: String,
  
});
const confirmingItemDeletion = ref(true);

const form = useForm();

function checkOut(item) {
  form.delete(route('accommodation.room.check_out',[props.item.id]), {
    errorBag: "checkOut",
       });
 
  
}
</script>