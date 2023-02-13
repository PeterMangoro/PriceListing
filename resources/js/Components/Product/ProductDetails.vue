<template>
  <div class="mb-2 border-b-2">
    <h1 class="text-2xl font-bold text-black">{{ product.title }}</h1>
    <rating :rating="rating" />
    <price :item="product" />
    <item-details :details="product.detail" />
    <location :location="product.location" />
  </div>
</template>

<script setup>
import Rating from "@/Components/Shared/Rating.vue";
import Price from "@/Components/Shared/Price.vue";
import ItemDetails from "@/Components/Shared/ItemDetails.vue";
import Location from "@/Components/Shared/Location.vue";

const props = defineProps({
  product: Object,
  rating: String,
});
</script>

<style>
</style>