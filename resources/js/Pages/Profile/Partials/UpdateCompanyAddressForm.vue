<script setup>
import { ref } from "vue";

import { Link, useForm } from "@inertiajs/vue3";
import JetButton from "@/Components/PrimaryButton.vue";
import JetFormSection from "@/Components/FormSection.vue";
import JetInput from "@/Components/TextInput.vue";
import JetInputError from "@/Components/InputError.vue";
import JetLabel from "@/Components/InputLabel.vue";
import JetActionMessage from "@/Components/ActionMessage.vue";
import JetSecondaryButton from "@/Components/SecondaryButton.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";

const props = defineProps({
  address: Object,
});

const form = useForm({
  street: props.address.street,
  town: props.address.town,
  city: props.address.city,
  country: props.address.country,
  remember: true,
  //    _method:"PUT"
});

const updateCompanyProfileInformation = () => {
  form.post(route("company_profile.update"), {
    errorBag: "updateCompanyProfileInformation",
    preserveScroll: true,
    onSuccess: () => clearPhotoFileInput(),
  });
};
</script>

<template>
  <JetFormSection @submitted="updateCompanyProfileInformation">
    <template #title>
      <p class="text-slate-50">
        Business Address Information
      </p>
       </template>

    <template #description>
      <p class="text-slate-50">
        Update your Institution's address information .
      </p>
      
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-3">
        <JetLabel for="street" value="Address" />
        <JetInput id="street" v-model="form.street" type="text" class="block w-full mt-1" required autofocus
          autocomplete="street" />
        <InputError class="mt-2" :message="form.errors.street" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <JetLabel for="town" value="Town" />
        <JetInput id="town" v-model="form.town" type="text" class="block w-full mt-1" autofocus autocomplete="town" />
        <InputError class="mt-2" :message="form.errors.town" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <JetLabel for="city" value="City" />
        <JetInput id="city" v-model="form.city" type="text" class="block w-full mt-1" required autofocus
          autocomplete="city" />
        <InputError class="mt-2" :message="form.errors.city" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <JetLabel for="country" value="Country" />
        <JetInput id="country" v-model="form.country" type="text" class="block w-full mt-1" autofocus
          autocomplete="country" />
        <InputError class="mt-2" :message="form.errors.country" />
      </div>
    </template>

    <template #actions>
      <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </JetActionMessage>

      <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Save
      </JetButton>
    </template>
</JetFormSection>
</template>
