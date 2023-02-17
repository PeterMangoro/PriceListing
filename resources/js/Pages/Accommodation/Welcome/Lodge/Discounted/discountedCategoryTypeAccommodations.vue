<template>
  <accommodation-layout>
    <!-- <snack-bar :categories = data.categories /> -->

    <div class="px-2">
      <div>
        <category-links
          :categories="data.category_types"
          route_type="welcome.accommodations.lodges.discounted.category_type"
          heading="Explore Discounted Accommodations "
        />
      </div>

      <div id="accommodations" v-if="data.accommodations">
        <all-accommodations
          v-if="data.accommodations"
          :heading="'Discounted ' + data.category_type + ' Accommodations'"
          :items="data.accommodations.data"
          :pagination="data.accommodations.links"
          routes="welcome.accommodations.lodges.discounted.category_type"
          :route_parameter="data.category_type"
          :categories="data.categories"
          route_type="welcome.accommodations.lodges.discounted.category"
        />
      </div>
    </div>
  </accommodation-layout>
</template>

<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";

import AllAccommodations from "@/Components/Accommodation/AllAccommodations.vue";
import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
import { provide } from "vue";

provide("show_route", "welcome.accommodations.lodges.show");

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>