<template>
  <accommodation-layout :title="data.location.city"> 
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <!-- <aside class=" basis-1/12">
      <div class="sticky top-10">
    <div v-for="category in data.categories" 
       :key="category.id">
       
       <Link
       :href="route('welcome.accommodations.category',category.slug)"
       >
              {{category.title}}
       </Link>
    </div>
       
       
      </div>
    </aside> -->

      <div class="px-2">
        <div id="accommodations" v-if="data.accommodations.data">
          <all-accommodations
            v-if="data.accommodations"
            :items="data.accommodations.data"
            :pagination="data.accommodations.links"
            :route_parameter="data.location.slug"
            routes="welcome.accommodations.location"
            :heading="
              'List of Selling Accommodations from ' + data.location.city
            "
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

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>