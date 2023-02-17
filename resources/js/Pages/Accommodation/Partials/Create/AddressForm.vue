<template>
   <form-section @submitted="addDetail">
    <template #title> <p class="text-slate-50 underline">Car Location </p> </template>

    <template #description>
      <p class="text-slate-50">Where is your property located?</p> 
     
    </template>

    <template #form>
        <div class="col-span-6 sm:col-span-3">
              <InputLabel for="street" value="Address" />
              <TextInput
                id="street"
                v-model="street"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="street"
              />
             
            </div>

            <div class="col-span-6 sm:col-span-3">
              <InputLabel for="town" value="Town" />
              <TextInput
                id="town"
                v-model="town"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="town"
              />
            
            </div>

            <div class="col-span-6 sm:col-span-3">
              <InputLabel for="city" value="City" />
              <TextInput
                id="city"
                v-model="city"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="city"
              />
             
            </div>
            
            <div class="col-span-6 sm:col-span-3">
              <InputLabel for="country" value="Country" />
              <TextInput
                id="country"
                v-model="country"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="country"
              />
             
            </div>

         
            


    </template>
    <template #actions>
      <div class="flex justify-between w-full">
        <div
          @click="back"
          class="
            gap-2
            p-1
            px-4
            text-black
            rounded
            bg-slate-300
            hover:bg-gray-400 hover:cursor-pointer
          "
        >
          Back
        </div>

        <submit-button
          
        >
          Next
        </submit-button>
      </div>
    </template>
   </form-section>
</template>

<script setup>
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import { useStorage } from "@/Composables/useStorage";

const street = useStorage("street", null);
const town =  useStorage("town", null);
const city = useStorage("city", null);
const country = useStorage("country", null);

const emit = defineEmits(["next", "prev"]);

const addDetail = () => {
  emit("next");
};

const back = () => {
  emit("prev");
};

</script>
  


<style>

</style>