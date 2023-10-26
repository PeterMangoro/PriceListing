<template>
    <car-insurance-layout title="Car Create">

      <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div v-if="step_one">
          <customer-detail-form @next="go_to_step_two"  />
        </div>

        <div v-if="step_two">
          <car-detail-form @next="go_to_step_three"  @prev="go_to_step_one" />
        </div>

        <div v-if="step_three">
          <review-detail
            @prev="go_to_step_two"
           
          />
        </div>
      </div>
    </div>
    </car-insurance-layout>
  </template>
  
  
  <script setup>
  import CarInsuranceLayout from "@/Layouts/CarInsuranceLayout.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import CustomerDetailForm from "@/Pages/Car/Insurance/Partials/Create/CustomerDetailForm.vue";
import CarDetailForm from "@/Pages/Car/Insurance/Partials/Create/CarDetailForm.vue";
import AddressForm from "@/Pages/Car/Insurance/Partials/Create/AddressForm.vue";
import ReviewDetail from "@/Pages/Car/Insurance/Partials/Create/ReviewDetail.vue";

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
  