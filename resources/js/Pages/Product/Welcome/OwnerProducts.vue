<template>
    <product-layout>
      <!-- <snack-bar :categories = data.categories /> -->
      <div class="p-4">
        <!-- <aside class=" basis-1/12">
        <div class="sticky top-10">
      <div v-for="category in data.categories" 
         :key="category.id">
         
         <Link
         :href="route('welcome.products.category',category.slug)"
         >
                {{category.title}}
         </Link>
      </div>
         
         
        </div>
      </aside> -->
  
        <div class="px-2">
          <div id="products" v-if="data.products.data">
            <p class="text-2xl font-extrabold text-black border-b-4">
              All Available Products by {{ data.owner.name }}
            </p>
            <all-products
              v-if="data.products"
              :heading="'All Products Supplied by ' + data.owner.name"
              :items="data.products.data"
              :pagination="data.products.links"
              routes="welcome.products.owner"
              :route_parameter="data.owner.username"
            />
          </div>
        </div>
      </div>
    </product-layout>
  </template>
  
  <script setup>
  import ProductLayout from "@/Layouts/ProductLayout.vue";
  import FeaturedProducts from "@/Components/Product/FeaturedProducts.vue";
  import FeaturedCategoryProducts from "@/Components/Product/FeaturedCategoryProducts.vue";
  import AllProducts from "@/Components/Product/AllProducts.vue";
  const props = defineProps({
    data: Object,
  });
  </script>
  
  <style>
  </style>