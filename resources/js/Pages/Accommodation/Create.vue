<template>
  <accommodation-layout title="Property Create">
 
    <div
      class="flex flex-wrap mx-auto max-w-7xl sm:px-6 lg:px-8 justify-evenly"
    >
    <div v-if="step_one">
          <detail-form @next="go_to_step_two" />
        </div>

        <div v-if="step_two">
          <address-form @next="go_to_step_three"  @prev="go_to_step_one" />
        </div>

        <div v-if="step_three">
          <attachment-form
            @prev="go_to_step_two"
            :category_types="data.category_types"
          />
        </div>

   
    </div>
  </accommodation-layout>
</template>


<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import DetailForm from "@/Pages/Accommodation/Partials/Create/DetailForm.vue";
import AddressForm from "@/Pages/Accommodation/Partials/Create/AddressForm.vue";
import AttachmentForm from "@/Pages/Accommodation/Partials/Create/AttachmentForm.vue";

const props = defineProps({
  data: Object,
});

const form = useForm({
  a_rooms: null,
  images: null,
  document: null,
  document_title: null,
  price: null,
  detail: null,
  street: null,
  town: null,
  city: null,
  country: null,
  categories: [],
  remember: true,
});

// function submit() {
//   form.post(route("accommodations.store"));
// }

const step_one = ref(true);
const step_two = ref(false);
const step_three = ref(false);

function go_to_step_one() {
  reset(), (step_one.value = true);
}

function go_to_step_two() {
  reset(), (step_two.value = true);
}

function go_to_step_three() {
  reset(), (step_three.value = true);
}
function next() {
  (step_one.value = false), (step_two.value = true);
}

function prev() {
  (step_one.value = true), (step_two.value = false);
}

function reset() {
  (step_one.value = false),
    (step_two.value = false),
    (step_three.value = false);
}
</script>
