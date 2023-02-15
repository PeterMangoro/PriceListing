<template>
    <car-layout>
      <!-- <snack-bar :categories = data.categories /> -->
  
      <div class="px-2">
        <div>
          <category-links
            :categories="data.category_types"
            route_type="welcome.cars.category_type"
            heading="Explore Different Categories"
          />
        </div>
  
        <div id="cars" v-if="data.cars">
          <all-cars
            v-if="data.cars"
            :heading="data.category_type + ' Cars'"
            :items="data.cars.data"
            :pagination="data.cars.links"
            routes="welcome.cars.category_type"
            :route_parameter="data.category_type"
            :categories="data.categories"
            route_type="welcome.cars.category"
          />
        </div> 
      </div>
    </car-layout>
  </template>
  
  <script setup>
  import CarLayout from "@/Layouts/CarLayout.vue";
  import FeaturedCars from "@/Components/Car/FeaturedCars.vue";
  import AllCars from "@/Components/Car/AllCars.vue";
  import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
  
  const props = defineProps({
    data: Object,
  });
  </script>
  
  <style>
  </style>