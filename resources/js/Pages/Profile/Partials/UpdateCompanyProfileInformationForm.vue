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
  profile: Object,
});

const form = useForm({
  mission: props.profile.mission,
  vision: props.profile.vision,
  values: props.profile.values,
  history: props.profile.history,
  year: props.profile.year,
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
        Institution Profile Information
      </p>
       </template>

    <template #description>
      <p class="text-slate-50">
        Update your Institution's profile information .
      </p>
      
    </template>

    <template #form>
      <!-- Mission -->
      <div class="col-span-6 sm:col-span-4">
        <JetLabel for="mission" value="Mission" />
        <JetInput
          id="mission"
          v-model="form.mission"
          type="text"
          class="block w-full mt-1"
          autocomplete="mission"
        />
        <JetInputError :message="form.errors.mission" class="mt-2" />
      </div>

      <!-- Vision -->
      <div class="col-span-6 sm:col-span-4">
        <JetLabel for="vision" value="Vision" />
        <JetInput
          id="vision"
          v-model="form.vision"
          type="text"
          class="block w-full mt-1"
        />
        <JetInputError :message="form.errors.vision" class="mt-2" />
      </div>

      <!-- Detail -->
      <div class="col-span-6 sm:col-span-4">
        <JetLabel for="values" value="Institution Values" />
        <text-area
          id="values"
          v-model="form.values"
          type="text"
          class="block w-full mt-1"
        />
        <p class="text-sm italic">
          Begin a new point with <span class="font-bold">*</span>
        </p>
        <JetInputError :message="form.errors.values" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <JetLabel for="history" value="Institution Brief History" />
        <text-area
          id="history"
          v-model="form.history"
          type="text"
          class="block w-full mt-1"
        />
        <JetInputError :message="form.errors.history" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </JetActionMessage>

      <JetButton
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Save
      </JetButton>
    </template>
  </JetFormSection>
</template>
