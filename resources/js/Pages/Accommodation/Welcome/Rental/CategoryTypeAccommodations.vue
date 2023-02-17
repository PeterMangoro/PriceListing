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
        <all-accommodations
          v-if="data.accommodations"
          :heading="data.category_type + ' Accommodations'"
          :items="data.accommodations.data"
          :pagination="data.accommodations.links"
          routes="welcome.accommodations.category_type"
          :route_parameter="data.category_type"
          :categories="data.categories"
          route_type="welcome.accommodations.category"
        />
      </div>
    </div>
  </accommodation-layout>
</template>

<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";

import FeaturedAccommodations from "@/Components/Accommodation/FeaturedAccommodations.vue";
import AllAccommodations from "@/Components/Accommodation/AllAccommodations.vue";
import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>