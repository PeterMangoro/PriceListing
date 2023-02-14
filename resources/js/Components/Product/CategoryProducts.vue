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
        <span v-if="heading">
          <h2
            v-if="category.title"
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
            {{ heading + " " + category.title }}
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
            {{ heading + " " + category }} Products
          </h2>
        </span>

        <span v-else>
          <h2
            v-if="category.title"
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
            List of all {{ category.title }}
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
            List of all {{ category }} Products
          </h2>
        </span>

        <search-table
          class="items-start p-2"
          :route-name="search_route"
          :route-parameter="category"
          placeholder="Search products..."
        />
      </div>
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
import ProductList from "@/Components/Product/Partials/ProductList.vue";

const props = defineProps({
  items: Object,
  routes: Object,
  pagination: Object,
  category: Object,
  heading: String,
  search_route: String,
});
</script>

<style></style>
