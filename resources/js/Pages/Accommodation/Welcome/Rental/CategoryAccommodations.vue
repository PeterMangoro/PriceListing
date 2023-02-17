<template>
  <accommodation-layout>
    <!-- <snack-bar :categories = data.categories /> -->

    <div class="px-2">
      <div>
        <category-links
          :categories="data.category_types"
          route_type="welcome.accommodations.category_type"
          heading="Explore Different Categories"
        />
      </div>

      <div id="accommodations" v-if="data.accommodations">
        <category-accommodations
          v-if="data.accommodations"
          :items="data.accommodations.data"
          :category="data.category"
          :pagination="data.accommodations.links"
          routes="welcome.accommodations.show"
          search_route="welcome.accommodations.category"
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

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>