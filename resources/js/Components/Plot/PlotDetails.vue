<template>
  <div>
   

    <p class="text-slate-50">{{ plot.size }}</p>


    <price :item="plot" />
    <item-details :details="plot.detail" class="text-slate-100" />
    <location :location="plot.location" class="text-slate-100" />
</div>
</template>

<script setup>
import Price from "@/Components/Shared/Price.vue";
import ItemDetails from "@/Components/Shared/ItemDetails.vue";
import Location from "@/Components/Shared/Location.vue";
const props = defineProps({
  plot: Object
})
</script>

<style></style>