<template>
  <div class="mb-2 border-b-2">
    <h1 class="text-2xl font-bold text-slate-100">{{ service.title }}</h1>
    <span v-if="rating" class="flex space-x-1">
      <heart-icon class="w-4 h-4 text-slate-100" />
      <p class="text-sm text-slate-100">{{ rating }}</p>    </span>
    
       
    
    
    <p class="py-2 border-t-2 border-b-2 text-slate-100">{{ service.detail }}</p>
    
   <p class="flex gap-2 py-2">
      <span class="font-medium text-slate-100">Location: </span>
      {{ service.location.street }} <br>
      {{ service.location.town }} <br>
      {{ service.location.city }}
      </p>
  </div>
</template>

<script setup>
import { HeartIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
  service: Object,
  rating: String,
});
</script>

<style>
</style>