<template>
    <PageHead
  description="Find and shop items with at cheap and affordable prices"
    pageTitle="Price listing"
    cover = "/storage/fcc/fcc.png"
  />
  <product-layout title="Shop">
    <div class="p-4">
      <div class="px-2">
        <!-- <div id="products" class="flex flex-wrap px-20 justify-evenly">
          <div v-if="data.pool.recent_products.length ">
            <featured-products
              heading="Recent Arrivals 📦"
              :items="data.pool.recent_products"
              routes="welcome.products.show"
              show_more="welcome.products.recent"
            />
          </div>

          <div v-if="data.pool.featured_products.length ">
            <featured-products
              heading="Featured Products 🛍"
              :items="data.pool.featured_products"
              routes="welcome.products.show"
              show_more="welcome.products.featured"
            />
          </div>

          <div v-if="data.pool.top_talks.length ">
            <featured-products
              heading="Top Talks 🛒"
              :items="data.pool.top_talks"
              routes="welcome.products.show"
              show_more="welcome.products.top_talks"
            />
          </div>

          <div v-if="data.pool.discounted_products.length ">
            <featured-products
              heading="Discounted For You  💰"
              :items="data.pool.discounted_products"
              routes="welcome.products.show"
              show_more="welcome.products.discounted"
            />
          </div>
        </div> -->

        <div id="products" v-if="data.products.data">
          <p class="text-2xl font-extrabold text-slate-50 border-b-2">
            Available Products
          </p>
          <div v-if="data.products.data.length">
            <all-products
              :items="data.products.data"
              :pagination="data.products.links"
              routes="welcome.products.index"
              :categories="data.category_types"
              route_type="welcome.products.category_type"
            />
          </div>
          <div v-else>
            <no-result-display />
          </div>
        </div>
      </div>
    </div>
  </product-layout>
</template>

<script setup>
import ProductLayout from "@/Layouts/ProductLayout.vue";
import FeaturedProducts from "@/Components/Product/FeaturedProducts.vue";
import AllProducts from "@/Components/Product/AllProducts.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
import PageHead from "@/Components/Shared/PageHead.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>