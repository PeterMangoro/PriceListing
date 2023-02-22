<template>
    <div class="mb-2 border-b-2">
      <div class="flex flex-wrap space-x-2 py-2">
        <h1 class="text-2xl font-bold text-slate-100">
         
          <slot name="heading" />

        </h1>
        <span
          @click="showGallery = !showGallery"
          class="
            inline-flex
            justify-center
            px-8
            py-2
            h-10
            text-sm
            font-medium
            hover:bg-black hover:bg-opacity-60
            text-slate-50
            capitalize
            border
            rounded
            hover:cursor-pointer
            border-green-500
          "
        >
          Gallery
        </span>
      </div>
  
      <rating :rating="rating" />
      <price :item="item" />
      <item-details :details="item.detail" class="text-slate-100" />
      <location :location="item.location" class="text-slate-100" />
    </div>
  
    <div v-if="showGallery">
      <gallery :images="item.images" @close="showGallery = false" />
    </div>
  </template>
  
  <script setup>
  import Rating from "@/Components/Shared/Rating.vue";
  import Price from "@/Components/Shared/Price.vue";
  import ItemDetails from "@/Components/Shared/ItemDetails.vue";
  import Location from "@/Components/Shared/Location.vue";  
  import Gallery from "@/Components/Shared/Modals/ShowGallery.vue";
  import { ref } from "vue";
  
  const props = defineProps({
    item: Object,
    rating: String,
  });
  
  const showGallery = ref(false);
  </script>
  
  
  <style>
  </style>