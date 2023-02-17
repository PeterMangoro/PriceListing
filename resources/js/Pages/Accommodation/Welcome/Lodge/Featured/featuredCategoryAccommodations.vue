<template>
  <accommodation-layout>
    <!-- <snack-bar :categories = data.categories /> -->

    <div class="px-2">
      <div>
        <category-links
          :categories="data.category_types"
          route_type="welcome.accommodations.lodges.featured.category_type"
          heading="Explore Trending Accommodations "
        />
      </div>

      <div id="accommodations" v-if="data.accommodations">
        <category-accommodations
          v-if="data.accommodations"
          :items="data.accommodations.data"
          :category="data.category"
          :pagination="data.accommodations.links"
          routes="welcome.accommodations.lodges.show"
          heading="50 Most Rated"
          search_route="welcome.accommodations.lodges.featured.category"
        />
      </div>
    </div>
  </accommodation-layout>
</template>

<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";

import FeaturedAccommodations from "@/Components/Accommodation/FeaturedAccommodations.vue";
import CategoryAccommodations from "@/Components/Accommodation/CategoryAccommodations.vue";
import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
import { provide } from "vue";

provide("show_route", "welcome.accommodations.lodges.show");

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>