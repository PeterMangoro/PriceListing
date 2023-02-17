<template>
  <div class="mb-2 border-b-2 border-blue-600 ">
    <h1 class="text-2xl font-bold text-slate-50">{{ accommodation.a_rooms }} Available rooms</h1>
     <rating class="mb-2 border-none " :rating="rating" />     
    <price class="mb-2 border-b-2 border-blue-600 " :item="accommodation" />
    <!-- <div class="w-32 my-2">
       <Link 
            href="route(add_path,add_parameter)"
            class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
           
                <p>View Gallery</p>
                 <tooltip
                 class="ml-1"
                  :tip=add_tip
              />
            </Link>
    </div> -->
  
    <item-details class="mb-2 border-b-2 border-blue-600 " :details="accommodation.detail" />
    <location class="text-slate-50" :location="accommodation.location" />
  </div>
</template>

<script setup>
import Rating from "@/Components/Shared/Rating.vue";
import Price from "@/Components/Shared/Price.vue";
import ItemDetails from "@/Components/Shared/ItemDetails.vue";
import Location from "@/Components/Shared/Location.vue";

const props = defineProps({
  accommodation: Object,
  rating: String,
});
</script>

<style>
</style>