<template>
  <div class="mb-2 border-b-2">
    <h1 class="text-2xl font-bold text-slate-50">{{ car.car_make }}</h1>
    <h1 class="text-xl font-medium text-slate-50">{{ car.car_model }}</h1>
    <span v-if="rating" class="flex space-x-1">
      <heart-icon class="w-4 h-4 text-red-600" />
      <p class="text-sm text-slate-50">{{ rating }}</p>
    </span>
    <span v-if="car.discount" class="flex flex-wrap justify-between">
      <p class="font-semibold text-slate-50">{{ car.discount.price }}</p>
      <p class="text-slate-50">{{ car.discount.percent }}</p>
      <p class="text-slate-50">( {{ car.discount.date }} )</p>
    </span>

    <p class="font-semibold text-slate-50" :class="{ [`line-through`]: car.discount }">
      {{ car.price }}
    </p>

    <p class="py-2 border-t-2 border-b-2">
      <span class="">
        <p v-for="(point, index) in car.detail" :key="index" class="flex gap-1">
          <span class="my-auto text-green-200"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg></span>
          <span v-if="index"> {{ point }} </span>
        </p>
      </span>
    </p>

    <p class="flex gap-2 py-2">
      <span class="font-medium text-slate-50">Location: </span>
      {{ car.location.street }} <br />
      {{ car.location.town }} <br />
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