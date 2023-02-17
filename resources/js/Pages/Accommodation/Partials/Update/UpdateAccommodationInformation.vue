
<template>
  <form-section @submitted="updateAccommodationDetail">
    <template #title>
      <p class="text-slate-50">
        Update Accommodation 
      </p>
      </template>

    <template #description>
      <p class="text-slate-50">
        Ensure your Accommodation is described in detail so that clients
      understand it better.
      </p>
     
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="a_rooms" value="Rooms Available" />
        <text-input
          id="a_rooms"
          ref="accommodationInput"
          v-model="form.a_rooms"
          type="number"
          min="1"
          class="block w-full mt-1"
          autocomplete="a_rooms"
        />
        <input-error :message="form.errors.a_rooms" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <span class="flex gap-2">
          <text-input
            id="title"
            ref="accommodationInput"
            :value="saleStatus()"
            type="text"
            class="block w-full mt-1"
            autocomplete="title"
            disabled
          />
          <span class="m-auto">
            <div
              v-if="form.sale_status == false"
              @click="form.sale_status = true"
              class="
                inline-flex
                items-center
                gap-6
                px-4
                py-2
                text-xs
                font-semibold
                tracking-widest
                text-white
                uppercase
                transition
                bg-blue-600
                border border-transparent
                rounded-md
                hover:cursor-pointer hover:bg-blue-700
                active:bg-blue-900
                focus:outline-none
                focus:border-blue-900
                focus:ring
                focus:ring-blue-300
                disabled:opacity-25
              "
            >
              Activate
            </div>

            <div
              v-else
              @click="form.sale_status = false"
              class="
                inline-flex
                items-center
                gap-6
                px-4
                py-2
                text-xs
                font-semibold
                tracking-widest
                text-white
                uppercase
                transition
                bg-red-600
                border border-transparent
                rounded-md
                hover:cursor-pointer hover:bg-red-700
                active:bg-red-900
                focus:outline-none
                focus:border-red-900
                focus:ring
                focus:ring-red-300
                disabled:opacity-25
              "
            >
              Suspend
            </div>
          </span>
        </span>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="detail" value="Description" />
        <text-area
          id="detail"
          ref="detailInput"
          v-model="form.detail"
          type="password"
          class="block w-full mt-1"
          autocomplete="new-password"
          rows="3"
        />

        <input-error :message="form.errors.detail" class="mt-2" />
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
import { pointConverter } from "@/Composables/pointConverter";

const detailInput = ref(null);
const accommodationInput = ref(null);
const props = defineProps({
  accommodation: String,
});
const form = useForm({
  a_rooms: props.accommodation.a_rooms,
  images: null,
  groups: [],
  price: props.accommodation.price,
  detail: pointConverter(props.accommodation.detail),
  street: props.accommodation.address.street,
  town: props.accommodation.address.town,
  city: props.accommodation.address.city,
  country: props.accommodation.address.country,
  category: null,
  accommodation_id: props.accommodation.id,
  sale_status: props.accommodation.sale_status,
  remember: true,
});

function saleStatus() {
  if (form.sale_status == true) {
    return "Currently Active";
  } else return "Currently Inactive";
}

const updateAccommodationDetail = () => {
  form.put(route("accommodations.update", props.accommodation.uuid), {
    errorBag: "updateAccommodationDetail",
    preserveScroll: true,
  });
};
</script>
