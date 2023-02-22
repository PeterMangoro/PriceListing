<template>
    <car-layout title="Car Create">

      <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div v-if="step_one">
          <detail-form @next="go_to_step_two" :car_makes="data.car_makes" />
        </div>

        <!-- <div v-if="step_two">
          <address-form @next="go_to_step_three"  @prev="go_to_step_one" />
        </div> -->

        <div v-if="step_two">
          <attachment-form
            @prev="go_to_step_one"
           
          />
        </div>
      </div>
    </div>
    </car-layout>
  </template>
  
  
  <script setup>
  import CarLayout from "@/Layouts/CarLayout.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import DetailForm from "@/Pages/Car/Partials/Create/DetailForm.vue";
import AddressForm from "@/Pages/Car/Partials/Create/AddressForm.vue";
import AttachmentForm from "@/Pages/Car/Partials/Create/AttachmentForm.vue";

const props = defineProps({
  data: Object,
});

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

function reset() {
  (step_one.value = false), 
  (step_two.value = false),
  (step_three.value = false);
}
  </script>
  