<template>
  <!-- Products Area -->
  <div class="py-2">
    <div
      class="
        px-4
        py-1
        mx-auto
        overflow-hidden
        border
        shadow-xl
        bg-slate-100
        sm:py-1 sm:px-6
        lg:max-w-7xl lg:px-8
        max-w-7xl
        sm:rounded-lg
      "
    >
      <div class="flex flex-wrap">
        <h2
          v-if="heading"
          class="
            items-start
            p-4
            text-2xl
            font-extrabold
            tracking-tight
            text-black
            capitalize
          "
        >
          {{ heading }}
        </h2>
        <h2
          v-else
          class="
            items-start
            p-4
            text-2xl
            font-extrabold
            tracking-tight
            text-black
            capitalize
          "
        >
          List of all Products
        </h2>

        <search-table
          v-if="!hide_search"
          class="items-start p-2"
          :route-name="routes"
          :route-parameter="route_parameter"
          placeholder="Search products..."
        />
      </div>

      <category-links
        :categories="categories"
        :route_type="route_type"
        class="shadow-none"
      />

      <product-list :items="items" />
      <!-- PAGINATION START -->
      <div class="flex flex-wrap justify-center pb-1">
        <div v-if="pagination" class="p-2 m-2">
          <Pagination :links="pagination" />
        </div>
      </div>
      <!--end col-->
      <!-- PAGINATION END -->
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from "vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import Pagination from "@/Components/Shared/Pagination.vue";
import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
import ProductList from "@/Components/Product/Partials/ProductList.vue";

const props = defineProps({
  items: Object,
  routes: Object,
  heading: String,
  route_parameter: String,
  pagination: Object,
  categories: Object,
  route_type: String,
  hide_search: Boolean,
});
</script>

<style></style>
