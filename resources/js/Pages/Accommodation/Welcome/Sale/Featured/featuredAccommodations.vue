<template>
  <accommodation-layout>
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2"></div>

      <div id="accommodations" v-if="data.accommodations.data">
        <!-- <p class="text-2xl font-extrabold text-black border-b-4">
            Top 50 Gossiped About Accommodations
          </p> -->
        <all-accommodations
          v-if="data.accommodations"
          :items="data.accommodations.data"
          :pagination="data.accommodations.links"
          routes="welcome.accommodations.featured"
          heading="Most Rated Accommodations of the week"
        />
      </div>
    </div>
  </accommodation-layout>
</template>

<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import AllAccommodations from "@/Components/Accommodation/AllAccommodations.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>