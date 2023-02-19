<template>
  <product-layout>
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2"></div>

      <div id="products" v-if="data.products.data">
        <p class="text-2xl font-extrabold text-black border-b-2">
          Recently Added Products
        </p>
        <all-products
          v-if="data.products"
          :items="data.products.data"
          :pagination="data.products.links"
          routes="welcome.products.recent"
          :categories="data.category_types"
          route_type="welcome.products.category_type"
        />
      </div>
    </div>
  </product-layout>
</template>
  
  <script setup>
import ProductLayout from "@/Layouts/ProductLayout.vue";
import AllProducts from "@/Components/Product/AllProducts.vue";

const props = defineProps({
  data: Object,
});
</script>
  
  <style>
</style>