<template>
    <product-layout>
        
      <div class="px-2">
        <div>
          <category-links
            :categories="data.category_types"
            route_type="welcome.products.category_type"
            heading="Explore Different Categories"
          />
        </div>
  
        <div id="products" v-if="data.products.data.length">
          <category-products
            v-if="data.products"
            :items="data.products.data"
            :category="data.category"
            :pagination="data.products.links"
            routes="welcome.products.show"
            search_route="welcome.products.category"
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
  import CategoryProducts from "@/Components/Product/CategoryProducts.vue";
  import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
  import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
  
  const props = defineProps({
    data: Object,
  });
  </script>
  
  <style>
  </style>