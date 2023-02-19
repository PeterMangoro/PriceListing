<template>
  <accommodation-layout>
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
          <p class="text-2xl font-extrabold text-black border-b-2">
            All Available Accommodations by {{ data.owner.name }}
          </p>
          <all-accommodations
            v-if="data.accommodations"
            :heading="'All Accommodations Supplied by ' + data.owner.name"
            :items="data.accommodations.data"
            :pagination="data.accommodations.links"
            routes="welcome.accommodations.owner"
            :route_parameter="data.owner.username"
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

provide("show_route", "welcome.accommodations.show");
const props = defineProps({
  data: Object,
});
</script>

<style>
</style>