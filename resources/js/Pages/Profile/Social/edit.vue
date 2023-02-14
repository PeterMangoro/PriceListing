<template>
  <app-layout>
    <bread-crumb :routes="routes" />

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="md:gap-6">
        <form-card>
          <form @submit.prevent="submit">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-4">
                <InputLabel for="location" value="Location" />
                <TextArea
                  id="location"
                  v-model="form.location"
                  type="text"
                  class="block w-full mt-1"
                  required
                  autofocus
                  autocomplete="location"
                />
                <InputError class="mt-2" :message="form.errors.location" />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <InputLabel for="size" value="Size in hectors" />
                <TextInput
                  id="size"
                  v-model="form.size"
                  type="number"
                  step="0.001"
                  min="0"
                  class="block w-full mt-1"
                  required
                  autofocus
                  autocomplete="size"
                />
                <InputError class="mt-2" :message="form.errors.size" />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <InputLabel for="price" value="Price" />
                <TextInput
                  id="price"
                  v-model="form.price"
                  type="number"
                  step="0.01"
                  class="block w-full mt-1"
                  required
                  autofocus
                  autocomplete="price"
                />
                <InputError class="mt-2" :message="form.errors.price" />
              </div>

              <div class="col-span-6 sm:col-span-4">
                <InputLabel for="detail" value="Land/Plot Description" />
                <TextArea
                  id="detail"
                  v-model="form.detail"
                  type="text"
                  class="block w-full mt-1"
                  required
                  autofocus
                  autocomplete="detail"
                />
                <InputError class="mt-2" :message="form.errors.detail" />
              </div>
            </div>

            <div class="flex items-center justify-end mt-4">
              <submit-button
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Upload
              </submit-button>
            </div>
          </form>
        </form-card>
      </div>
    </div>
  </app-layout>
</template>


<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import BreadCrumb from "@/Components/Partials/breadCrumb.vue";
import formCard from "@/Components/Shared/Form/formCard.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
const props = defineProps({
  data: Object,
});

const form = useForm({
  size: props.data.plot.size,
  images: null,
  price: props.data.plot.price,
  detail: props.data.plot.detail,
  location: props.data.plot.location,
  remember: true,
  _method: "PUT",
});

function submit() {
  form.post(route("plots.update", props.data.plot.uuid));
}
const routes = [
  {
    name: "User Land",
    link: "plots.index",
  },
  {
    name: "Land-Add",
    link: "plots.create",
  },
  {
    name: "Land-Edit",
    // link: "plots.create",
  },
];
</script>
