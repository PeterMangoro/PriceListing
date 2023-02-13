<template> 
  <check-in-modal
    :show="confirmingCheckingIn"
    @close="confirmingCheckingIn = false"
  >
    <template #title> Checking In </template>

    <template #content>
      <form-card>
          <form @submit.prevent="submit">
            <div class="grid grid-cols-6 gap-6">
               <div class="col-span-6 sm:col-span-5">
                <InputLabel for="name" value="Occupant Name" />
                <TextInput
                  id="name"
                  v-model="form.name"
                  type="text"
                  class="block w-full mt-1"
                  required
                  autofocus
                  autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
              </div>

<div class="col-span-6 sm:col-span-5">
                <InputLabel for="service" value="Service" />
                <TextInput
                  id="service"
                  v-model="form.service"
                  type="text"
                  class="block w-full mt-1"
                  required
                  autofocus
                  autocomplete="service"
                />
                <InputError class="mt-2" :message="form.errors.service" />
              </div>
         
            </div>
            
          
           
          </form>
        </form-card>
    </template>

    <template #footer>
      <JetSecondaryButton @click="$emit('close')">
        Cancel
      </JetSecondaryButton>

      <JetSuccessButton
        class="ml-3"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        @click="[checkIn(room),$emit('close')]"
        
      >
        Check-In
      </JetSuccessButton>
    </template>
  </check-in-modal>
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import JetActionSection from "@/Components/ActionSection.vue";
import CheckInModal from "@/Components/Shared/Room/CheckInModal.vue"
import JetSuccessButton from "@/Components/SuccessButton.vue";
import JetSecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";

const props = defineProps({
  path: Object,
  item: Object,
  parent:String,
  message: String,
  
});
const confirmingCheckingIn = ref(true);

const form = useForm({
  name: null,
  service:null,
  remember: true,
});

function checkIn(item) {
  form.post(route('accommodation.room.check_in',[props.item.id]), {
    errorBag: "deleteItem",
    
       });
 
  
}
</script>