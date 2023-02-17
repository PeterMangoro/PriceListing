
<template >
  <form-section @submitted="addDetail">
    <template #title>
      <p class="text-slate-50 underline">Car Description</p>
    </template>

    <template #description>
      <p class="text-slate-50">Tell us about your car</p>
      <p class="text-slate-50">Prices are tagged in USD</p>
      <p class="pt-2 text-slate-50">
        For points, mark at the beginning of each point with
        <span class="text-lg font-medium text-slate-50">*</span> eg
      </p>

      <p class="text-slate-50">* Solid Engine</p>
      <p class="text-slate-50">* Traveled less than 4k km</p>
      <p class="text-slate-50">* Luxury seats</p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-6">
        <fieldset>
          <div class="text-base font-medium text-black" aria-hidden="true">
            Mark Appropriate Action For Your Vehicle
          </div>
          <div class="mt-4 space-y-4">
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input
                  v-model="rent_status"
                  id="rent_status"
                  name="rent_status"
                  type="checkbox"
                  class="
                    w-4
                    h-4
                    text-indigo-600
                    border-gray-300
                    rounded
                    focus:ring-indigo-500
                  "
                />
              </div>

              <div class="ml-3 text-sm">
                <label for="comments" class="font-medium text-black"
                  >Car Hire/Rent</label
                >
                <p class="text-black">Let your car be up for Hiring.</p>
              </div>
            </div>
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input
                  v-model="sale_status"
                  id="sale_status"
                  name="sale_status"
                  type="checkbox"
                  class="
                    w-4
                    h-4
                    text-indigo-600
                    border-gray-300
                    rounded
                    focus:ring-indigo-500
                  "
                />
              </div>
              <div class="ml-3 text-sm">
                <label for="candidates" class="font-medium text-black"
                  >Sale</label
                >
                <p class="text-black">Let your car be sold in the market.</p>
              </div>
            </div>
          </div>
        </fieldset>
      </div>

      <div class="col-span-6 sm:col-span-3">
        <label for="car_make" class="block text-sm font-medium text-black"
          >Car Make</label
        >
        <select
          v-model="car_make_id"
          id="car_make_id"
          required
          autocomplete="car_make_id"
          class="
            block
            w-full
            px-3
            py-2
            mt-1
            bg-transparent
            border border-gray-300
            rounded-md
            shadow-sm
            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
            sm:text-sm
          "
        >
          <option
            class=""
            v-for="car in car_makes"
            :key="car.id"
            :value="car.id"
          >
            {{ car.title }}
          </option>
        </select>
      </div>

      <div class="col-span-6 sm:col-span-3">
        <label for="country" class="block text-sm font-medium text-black"
          >Car Model</label
        >
        <select
          v-model="car_model_id"
          id="car_model_id"
          required
          autocomplete="car_model_id"
          class="
            block
            w-full
            px-3
            py-2
            mt-1
            bg-transparent bg-white
            border border-gray-300
            rounded-md
            shadow-sm
            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
            sm:text-sm
          "
        >
          <option
            class=""
            v-for="carmodel in car_makes[car_make_id - 1].car_models"
            :key="carmodel.id"
            :value="carmodel.id"
          >
            {{ carmodel.title }}
          </option>
        </select>
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
            ref="carPrice"
            v-model="price"
            type="number"
            step="0.01"
            class="block w-full mt-1 rounded-none rounded-r-md"
            autocomplete="price"
          />
        </div>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="detail" value="Car Description" />
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

const price = useStorage("price", null);
const detail = useStorage("detail", null);
const rent_status = useStorage("rent_status", null);
const sale_status = useStorage("sale_status", true);
const car_make_id = useStorage("car_make_id", 1);
const car_model_id = useStorage("car_model_id", null);

const props = defineProps({
  car_makes: Object,
});
const emit = defineEmits(["next", "prev"]);

const addDetail = () => {
  emit("next");
};

const notesInput = ref(null);
</script>
  