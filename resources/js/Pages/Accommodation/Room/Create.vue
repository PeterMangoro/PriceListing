<template>
  <accommodation-layout>
    <bread-crumb :routes="routes" />

    <div
      class="flex flex-wrap mx-auto max-w-7xl sm:px-6 lg:px-8 justify-evenly"
    >
      <div class="md:gap-6">
        <form-card>
          <form @submit.prevent="submit">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-4">
                <InputLabel for="title" value="Room Name" />
                <TextInput
                  id="title"
                  v-model="form.title"
                  type="text"
                  class="block w-full mt-1"
                  required
                  autofocus
                  autocomplete="title"
                />
                <InputError class="mt-2" :message="form.errors.title" />
              </div>
              <div class="col-span-6 sm:col-span-4">
                <InputLabel for="type" value="Room Type" />
                <TextInput
                  id="type"
                  v-model="form.type"
                  type="text"
                  class="block w-full mt-1"
                  required
                  autofocus
                  autocomplete="type"
                />
                <InputError class="mt-2" :message="form.errors.type" />
              </div>

              <div class="col-span-6 sm:col-span-4">
                <InputLabel for="price" value="Price" />
                <div class="flex">
                  <span
                    class="
                      inline-flex
                      items-center
                      px-3
                      mt-1
                      text-sm text-gray-500
                      bg-white
                      border border-gray-300
                      shadow-sm
                      rounded-l-md
                      focus:border-indigo-300
                      focus:ring
                      focus:ring-indigo-200
                      focus:ring-opacity-50
                    "
                    >$</span
                  >
                  <text-input
                    id="price"
                    ref="accommodationPrice"
                    v-model="form.price"
                    type="number"
                    step="0.01"
                    class="block w-full mt-1 rounded-none rounded-r-md"
                    autocomplete="price"
                  />
                </div>
                <InputError class="mt-2" :message="form.errors.price" />
              </div>

              <div class="col-span-6 sm:col-span-4">
                <InputLabel for="detail" value="Room Description" />
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

            <div>
              <label class="block mt-3 text-sm font-medium text-black">
                Choose Images
              </label>
              <div
                class="
                  flex
                  justify-center
                  px-6
                  pt-2
                  pb-2
                  mt-1
                  border-2 border-gray-300 border-dashed
                  rounded-md
                "
              >
                <div class="space-y-1 text-center">
                  <div class="flex text-sm text-black">
                    <label
                      for="file-upload"
                      class="
                        font-medium
                        text-indigo-600
                        bg-transparent bg-white
                        rounded-md
                        cursor-pointer
                        hover:text-indigo-500
                        focus-within:outline-none
                        focus-within:ring-2
                        focus-within:ring-offset-2
                        focus-within:ring-indigo-500
                      "
                    >
                      <input
                        id="images"
                        @input="form.images = $event.target.files"
                        type="file"
                        multiple
                        @change="onFileChange"
                      />
                    </label>
                  </div>
                  <p class="text-xs text-black">PNG, JPG, GIF up to 10MB</p>

                  <InputError class="mt-2" :message="form.errors.images" />
                </div>
              </div>
            </div>

            <div class="flex items-center justify-end mt-4">
              <submit-button
                id="submit"
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

      <div v-if="form.hasErrors" class="p-3 my-auto">
        <div class="w-auto gap-3 p-2 bg-white rounded-md">
          <div
            v-for="error in form.errors"
            :key="error.id"
            class="py-3 text-red-600"
          >
            *{{ error }}
          </div>
        </div>
      </div>
    </div>
  </accommodation-layout>
</template>


<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import { useForm } from "@inertiajs/vue3";

import formCard from "@/Components/Shared/Form/formCard.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";

import { ref } from "vue";

const props = defineProps({
  data: Object,
});

const form = useForm({
  title: null,
  type: null,
  images: null,
  price: null,
  detail: null,

  remember: true,
});

function submit() {
  form.post(route("accommodations.rooms.store", props.data.parent.uuid));
}
const routes = [
  {
    name: "User Accommodations",
    link: "accommodations.index",
  },
  {
    name: "Accommodation-Add",
    link: "accommodations.create",
  },
];
</script>
