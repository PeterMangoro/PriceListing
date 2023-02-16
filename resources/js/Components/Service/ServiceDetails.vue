<template>
  <div class="mb-2 border-b-2">
    <h1 class="text-2xl font-bold text-slate-100">{{ service.title }}</h1>
    <rating :rating="rating" />
    
       
    
    
      <item-details :details="service.detail" class="text-slate-100" />
    
      <location :location="service.location" class="text-slate-100" />
  </div>
</template>

<script setup>
import { HeartIcon } from "@heroicons/vue/24/solid";
import ItemDetails from "@/Components/Shared/ItemDetails.vue";
import Location from "@/Components/Shared/Location.vue";
import Rating from "@/Components/Shared/Rating.vue";

const props = defineProps({
  service: Object,
  rating: String,
});
</script>

<style>
</style>