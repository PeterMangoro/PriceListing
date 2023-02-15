<template>
  <div class="mb-2 border-b-2">
    <h1 class="text-2xl font-bold text-black">{{ car.car_make }}</h1>
     <h1 class="text-xl font-medium text-black">{{ car.car_model }}</h1>
    <span v-if="rating" class="flex space-x-1">
      <heart-icon class="w-4 h-4 text-red-600" />
      <p class="text-sm text-black">{{ rating }}</p>    </span>
      <span 
      v-if="car.discount"
      class="flex flex-wrap justify-between">
         <p class="font-semibold text-black ">{{ car.discount.price }}</p>         
         <p class="text-red-500 ">{{ car.discount.percent }}</p>
         <p class="text-red-500 ">( {{ car.discount.date }} )</p>
      </span>
       
    <p 
    class="font-semibold text-black"
    :class="{ [ `line-through`]: car.discount }"
    >{{ car.price }}</p>
    
    <p class="py-2 border-t-2 border-b-2">{{ car.detail }}</p>
    
   <p class="flex gap-2 py-2">
      <span class="font-medium text-slate-800">Location: </span>
      {{ car.location.street }} <br />
      {{ car.location.town }} <br>
      {{ car.location.city }}
    </p>
  </div>
</template>

<script setup>
import { HeartIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
  car: Object,
  rating: String,
});
</script>

<style>
</style>