
<template>
  <form-section @submitted="updatePlotDetail">
    <template #title>
      <p class="text-slate-50">
        Update Plot Address
      </p> </template>

    <template #description>
      <p class="text-slate-50">
        Tell your clients where the Farm is located.
      </p>
    
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-3">
        <InputLabel for="street" value="Address" />
        <TextInput id="street" v-model="form.street" type="text" class="block w-full mt-1" required autofocus
          autocomplete="street" />
        <InputError class="mt-2" :message="form.errors.street" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <InputLabel for="town" value="Town" />
        <TextInput id="town" v-model="form.town" type="text" class="block w-full mt-1" autofocus autocomplete="town" />
        <InputError class="mt-2" :message="form.errors.town" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <InputLabel for="city" value="City" />
        <TextInput id="city" v-model="form.city" type="text" class="block w-full mt-1" required autofocus
          autocomplete="city" />
        <InputError class="mt-2" :message="form.errors.city" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <InputLabel for="country" value="Country" />
        <TextInput id="country" v-model="form.country" type="text" class="block w-full mt-1" autofocus
          autocomplete="country" />
        <InputError class="mt-2" :message="form.errors.country" />
      </div>
    </template>

    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

      <submit-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Save
      </submit-button>
    </template>
</form-section>
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/Shared/Form/ActionMessage.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import { pointConverter } from "@/Composables/pointConverter";

const detailInput = ref(null);
const plotInput = ref(null);
const props = defineProps({
  plot: String,
});
const form = useForm({
  size: props.plot.size,
  images: null,
  groups: [],
  price: props.plot.price,
  detail: pointConverter(props.plot.detail),
  plot_id: props.plot.id,
  sale_status: props.plot.sale_status,
  street: props.plot.address.street,
  town: props.plot.address.town,
  city: props.plot.address.city,
  country: props.plot.address.country,
  remember: true,
});

function saleStatus() {
  if (form.sale_status == true) {
    return "Currently Active";
  } else return "Currently Inactive";
}

const updatePlotDetail = () => {
  form.put(route("plots.update", props.plot.uuid), {
    errorBag: "updatePlotDetail",
    preserveScroll: true,
  });
};
</script>
