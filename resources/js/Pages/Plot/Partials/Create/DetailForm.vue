
<template>
  <form-section @submitted="createPlot">
    <template #title>
      <p class="text-slate-50">Uploading your Property</p>
    </template>

    <template #description>
      <p class="text-slate-50">Tell us about your Property</p>
      <p class="text-slate-50">Prices are tagged in USD</p>
      <p class="pt-2 text-slate-50">
        For points, mark at the beginning of each point with
        <span class="text-lg font-medium text-slate-50">*</span> eg
      </p>

      <p class="text-slate-50">* Fertile arable land</p>
      <p class="text-slate-50">* Close to a water source</p>
      <p class="text-slate-50">* Borehole available</p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-3">
        <InputLabel for="street" value="Address" />
        <TextInput
          id="street"
          v-model="form.street"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="street"
        />
        <InputError class="mt-2" :message="form.errors.street" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <InputLabel for="town" value="Town" />
        <TextInput
          id="town"
          v-model="form.town"
          type="text"
          class="block w-full mt-1"
          autofocus
          autocomplete="town"
        />
        <InputError class="mt-2" :message="form.errors.town" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <InputLabel for="city" value="City" />
        <TextInput
          id="city"
          v-model="form.city"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="city"
        />
        <InputError class="mt-2" :message="form.errors.city" />
      </div>

      <div class="col-span-6 sm:col-span-3">
        <InputLabel for="country" value="Country" />
        <TextInput
          id="country"
          v-model="form.country"
          type="text"
          class="block w-full mt-1"
          autofocus
          autocomplete="country"
        />
        <InputError class="mt-2" :message="form.errors.country" />
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
        <input-label for="detail" value="Property Description" />
        <text-area
          id="detail"
          ref="detailInput"
          v-model="form.detail"
          type="text"
          class="block w-full mt-1"
          autocomplete="detail"
          rows="5"
          required
        />
      </div>

      <div class="col-span-6 sm:col-span-4">
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
            <p class="text-xs text-black">PNG, JPG, GIF up to 2MB</p>
            <InputError
              class="mt-2"
              v-for="(error, image) in form.errors.images"
              :key="image"
              :message="error"
            />
            <InputError class="mt-2" :message="form.errors.images" />
          </div>
        </div>

        <label class="block mt-3 text-sm font-medium text-black">
          Choose A Document
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
            <div class="flex justify-between">
              <InputLabel
                for="document"
                value="Document Title"
                class="m-auto"
              />
              <TextInput
                id="document_title"
                v-model="form.document_title"
                type="text"
                class="block w-8/12 mt-1"
                autofocus
                autocomplete="document_title"
              />
            </div>
            <InputError class="mt-2" :message="form.errors.document_title" />
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
                  id="document"
                  @input="form.document = $event.target.files[0]"
                  type="file"
                  @change="onFileChange"
                />
              </label>
            </div>
            <p class="text-xs text-black">*document upload is not required</p>
            <InputError class="mt-2" :message="form.errors.document" />
          </div>
        </div>
      </div>
    </template>

    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

      <submit-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
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

const detailInput = ref(null);
const plotInput = ref(null);
const props = defineProps({
  plot: String,
});

const form = useForm({
  street: null,
  town: null,
  city: null,
  country: null,
  size: null,
  images: null,
  document: null,
  document_title: null,
  price: null,
  detail: null,
  location: null,
  remember: true,
});

function createPlot() {
  form.post(route("plots.store"));
}
</script>
