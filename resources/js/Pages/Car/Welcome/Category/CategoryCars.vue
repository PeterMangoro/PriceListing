<template>
    <car-layout>
      
      <div class="px-2">
        <div>
          <category-links
            :categories="data.categories"
            route_type="welcome.cars.category"
            heading="Explore Different Car Model"
          />
        </div>
  
        <div id="cars" v-if="data.cars">
          <category-cars
            v-if="data.cars"
            :items="data.cars.data"
            :category="data.category"
            :pagination="data.cars.links"
            routes="welcome.cars.show"
            search_route="welcome.cars.category"
          />
        </div>
      </div>
    </car-layout>
  </template>
  
  <script setup>
  import CarLayout from "@/Layouts/CarLayout.vue";
  import FeaturedCars from "@/Components/Car/FeaturedCars.vue";
  import CategoryCars from "@/Components/Car/CategoryCars.vue";
  import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
  
  const props = defineProps({
    data: Object,
  });
  </script>
  
  <style>
  </style>