
<template >
  <form-section @submitted="addDetail">
    <template #title>
      <p class="text-slate-50 underline">Product Description</p>
    </template>

    <template #description>
      <p class="text-slate-50">Tell us about your product</p>
      <p class="text-slate-50">Prices are tagged in USD</p>
      <p class="pt-2 text-slate-50">
        For points, mark at the beginning of each point with
        <span class="text-lg font-medium text-slate-50">*</span> eg
      </p>

      <p class="text-slate-50">* Yellow Shirt</p>
      <p class="text-slate-50">* LightWeight Breathable polyester fabric</p>
      <p class="text-slate-50">* Great for Hot Conditions</p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="title" value="Product Name/Title" />
        <text-input
          id="title"
          ref="titleInput"
          v-model="title"
          type="text"
          class="block w-full mt-1"
          autocomplete="title"
          required
        />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="price" value="Price" />
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
            ref="productPrice"
            v-model="price"
            type="number"
            step="0.01"
            class="block w-full mt-1 rounded-none rounded-r-md"
            autocomplete="price"
          />
        </div>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="detail" value="Product Description" />
        <text-area
          id="detail"
          ref="detailInput"
          v-model="detail"
          type="text"
          class="block w-full mt-1"
          autocomplete="detail"
          rows="5"
          required
        />
      </div>
    </template>

    <template #actions>
      <div class="flex justify-end w-full">
        <submit-button
          :class="{ 'opacity-25': processing }"
          :disabled="processing"
        >
          Next
        </submit-button>
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

const title = useStorage("title", null);
const price = useStorage("price", null);
let detail = ref(useStorage("detail", null));

const emit = defineEmits(["next", "prev"]);

const addDetail = () => {
  emit("next");
};

const notesInput = ref(null);
</script>
  