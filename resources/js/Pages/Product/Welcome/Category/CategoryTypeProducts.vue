<template>
  <product-layout>
    <!-- <snack-bar :categories = data.categories /> -->

    <div class="px-2">
      <div>
        <category-links
          :categories="data.category_types"
          route_type="welcome.products.category_type"
          heading="Explore Different Categories"
        />
      </div>

      <div id="products" v-if="data.products.data.length">
        <all-products
          v-if="data.products"
          :heading="data.category_type + ' Products'"
          :items="data.products.data"
          :pagination="data.products.links"
          routes="welcome.products.category_type"
          :route_parameter="data.category_type"
          :categories="data.categories"
          route_type="welcome.products.category"
        />
      </div>

            <div v-else>
        <no-result-display />
      </div>
      
    </div>
  </product-layout>
</template>

<script setup>
import ProductLayout from "@/Layouts/ProductLayout.vue";
import FeaturedProducts from "@/Components/Product/FeaturedProducts.vue";
import AllProducts from "@/Components/Product/AllProducts.vue";
import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>