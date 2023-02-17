
<template >
  <form-section @submitted="addDetail">
    <template #title>
      <p class="text-slate-50 underline">Property Description</p>
    </template>

    <template #description>
      <p class="text-slate-50">Tell us about your property</p>
      <p class="text-slate-50">Prices are tagged in USD</p>
      <p class="pt-2 text-slate-50">
        For points, mark at the beginning of each point with
        <span class="text-lg font-medium text-slate-50">*</span> eg
      </p>

      <p class="text-slate-50">* Durawalled</p>
      <p class="text-slate-50">* Borehole Water</p>
      <p class="text-slate-50">* Free Wifi</p>
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
                <p class="text-black">
                  Let your property be sold in the market.
                </p>
              </div>
            </div>

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
                  >Rental Property
                </label>
                <p class="text-black">Let your property be up for Rental.</p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input
                  v-model="lodge_status"
                  id="lodge_status"
                  name="lodge_status"
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
                <label for="lodge_status" class="font-medium text-black"
                  >Tourism Property
                </label>
                <p class="text-black">
                  This is for Hotels, Lodges, Motels, Breakfast houses, etc.
                </p>
              </div>
            </div>
          </div>
        </fieldset>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="rooms" value="Available Rooms" />
        <text-input
          id="rooms"
          ref="roomsInput"
          v-model="rooms"
          type="number"
          class="block w-full mt-1"
          autocomplete="rooms"
          required
        />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="price" value="Lowest Price Offer" />
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
        <input-label for="detail" value="Property Description" />
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
const rooms = useStorage("rooms", null);
const detail = useStorage("detail", null);
const rent_status = useStorage("rent_status", null);
const sale_status = useStorage("sale_status", true);
const lodge_status = useStorage("lodge_status", null);

const emit = defineEmits(["next", "prev"]);

const addDetail = () => {
  emit("next");
};

const notesInput = ref(null);
</script>
  