
<template >
  <form-section @submitted="addDetail">
    <template #title>
      <p class="text-slate-50 underline">Customer Description</p>
    </template>

    <template #description>
      <p class="pt-2 text-slate-50">
        For contact, mark at the beginning of each new contact with
        <span class="text-lg font-medium text-slate-50">*</span> eg
      </p>

      <p class="text-slate-50">* 0772 123 456</p>
      <p class="text-slate-50">* 0723 987 654</p>
      <p class="text-slate-50">* example@gmail.com</p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="name" value="Customer Full Name" />

        <text-input
          id="name"
          ref="carName"
          v-model="name"
          type="text"
          class="block w-full mt-1"
          autocomplete="name"
        />
      </div>

      <!-- <div class="col-span-6 sm:col-span-4">
        <input-label for="national_id" value="Customer ID/Passport Number" />

        <text-input
          id="national_id"
          ref="nationalId"
          v-model="national_id"
          type="text"
          class="block w-full mt-1"
          autocomplete="national_id"
        />
      </div> -->

      <div class="col-span-6 sm:col-span-4">
        <input-label for="contact" value="Customer Contact Details" />
        <text-area
          id="contact"
          ref="contactInput"
          v-model="contact"
          type="text"
          class="block w-full mt-1"
          autocomplete="contact"
          rows="5"
          required
        />
      </div>
    </template>

    <template #actions>
      <div class="flex justify-end w-full">
        <submit-button> Next </submit-button>
      </div>
    </template>
  </form-section>
</template>
  <script setup>
import { ref, watch } from "vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import { useStorage } from "@/Composables/useStorage";

const name = useStorage("name", null);
const contact = useStorage("contact", null);
const national_id = useStorage("national_id", null);

const emit = defineEmits(["next", "prev"]);

const addDetail = () => {
  emit("next");
};
</script>
  