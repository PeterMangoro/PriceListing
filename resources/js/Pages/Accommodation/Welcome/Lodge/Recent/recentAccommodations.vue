<template>
  <accommodation-layout>
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2"></div>

      <div id="accommodations" v-if="data.accommodations.data">
        <all-accommodations
          v-if="data.accommodations"
          :items="data.accommodations.data"
          :pagination="data.accommodations.links"
          routes="welcome.accommodations.recent"
          heading=" Recently Uploaded Accommodations"
        />
      </div>
    </div>
  </accommodation-layout>
</template>

<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import AllAccommodations from "@/Components/Accommodation/AllAccommodations.vue";
import { provide } from "vue";

provide("show_route", "welcome.accommodations.show");

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>