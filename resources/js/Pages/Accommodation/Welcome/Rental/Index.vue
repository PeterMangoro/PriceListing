<template>
  <accommodation-layout>
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2">
        <div id="accommodations" v-if="data.accommodations.data">
          <p
            class="
              text-2xl
              font-extrabold
              text-slate-50
              border-b-2 border-blue-600
            "
          >
            Find The Best Rental Places at an Affordable Price
          </p>
          <all-accommodations
            v-if="data.accommodations"
            :items="data.accommodations.data"
            :pagination="data.accommodations.links"
            routes="welcome.accommodations.rentals.index"
            heading="List of Rental Accommodations"
          />
        </div>
      </div>
    </div>
  </accommodation-layout>
</template>

<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";

import FeaturedAccommodations from "@/Components/Accommodation/FeaturedAccommodations.vue";
import FeaturedCategoryAccommodations from "@/Components/Accommodation/FeaturedCategoryAccommodations.vue";
import AllAccommodations from "@/Components/Accommodation/AllAccommodations.vue";
import GroupedAccommodations from "@/Components/Accommodation/GroupedAccommodations.vue";
import { provide } from "vue";

provide("show_route", "welcome.accommodations.rentals.show");

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>