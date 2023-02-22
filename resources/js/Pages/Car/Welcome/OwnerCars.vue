<template>
  <car-layout :title="data.owner.username +' Garage' ">
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2">
        <div id="cars" v-if="data.cars.data">
          <!-- <p class="text-2xl font-extrabold text-slate-50 border-b-2">
            Available Cars by {{ data.owner.name }}
          </p> -->
          <all-cars
            v-if="data.cars"
            :heading="'Cars Supplied by ' + data.owner.name"
            :items="data.cars.data"
            :pagination="data.cars.links"
            routes="welcome.cars.owner"
            :route_parameter="data.owner.username"
          />
        </div>
      </div>
    </div>
  </car-layout>
</template>

<script setup>
import CarLayout from "@/Layouts/CarLayout.vue";
import FeaturedCars from "@/Components/Car/FeaturedCars.vue";
import FeaturedCategoryCars from "@/Components/Car/FeaturedCategoryCars.vue";
import AllCars from "@/Components/Car/AllCars.vue";
import GroupedCars from "@/Components/Car/GroupedCars.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>