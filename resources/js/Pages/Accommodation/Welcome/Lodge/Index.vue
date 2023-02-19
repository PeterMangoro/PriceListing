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
        <!-- <div
          id="accommodations"
          class="flex flex-wrap px-20 justify-evenly"
          v-if="data.pool.featured_accommodations"
        >
          <div>
            <featured-accommodations
              heading="Recent Arrivals"
              :items="data.pool.recent_accommodations"
              routes="welcome.accommodations.lodges.show"
              show_more="welcome.accommodations.lodges.recent"
            />
          </div>

          
           <div>
            <featured-accommodations
              heading="Discounted For You  💰"
              :items="data.pool.discounted_accommodations"
              routes="welcome.accommodations.lodges.show"
              show_more="welcome.accommodations.lodges.discounted"
            />
          </div>

           <div>
            <featured-accommodations
              heading="Featured "
              :items="data.pool.featured_accommodations"
              routes="welcome.accommodations.lodges.show"
              show_more="welcome.accommodations.lodges.featured"
            />
          </div>

          <div>
            <featured-accommodations
              heading="Top Talks"
              :items="data.pool.top_talks"
              routes="welcome.accommodations.lodges.show"
              show_more="welcome.accommodations.lodges.top_talks"
            />
          </div>

       
        </div> -->

        <div id="accommodations" v-if="data.accommodations.data">
          <p
            class="
              text-2xl
              font-extrabold
              text-slate-50
              border-b-2 border-blue-600
            "
          >
            Feel at home for an Affordable Price
          </p>
          <all-accommodations
            v-if="data.accommodations"
            :items="data.accommodations.data"
            :pagination="data.accommodations.links"
            routes="welcome.accommodations.lodges.index"
            heading="List of Lodging Accommodations"
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

provide("show_route", "welcome.accommodations.lodges.show");

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>