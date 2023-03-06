<template>
  <!-- Products Area -->
  <div class="py-2">
    <div
      class="px-4 py-1 mx-auto overflow-hidden shadow-xl sm:py-1 sm:px-6 lg:max-w-7xl lg:px-8 max-w-7xl sm:rounded-lg"
    >
      <div class="flex flex-wrap">
        <!-- <h2
          v-if="heading"
          class="
            items-start
            p-4
            text-2xl
            font-extrabold
            tracking-tight
            text-slate-50
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
            text-slate-50
            capitalize
          "
        >
          List of all Accommodations
        </h2> -->

        <search-table
          v-if="!hide_search"
          class="items-start p-2"
          :route-name="routes"
          :route-parameter="route_parameter"
          placeholder="Search accommodations..."
        />
      </div>

      <category-links
        v-if="categories"
        :categories="categories"
        :route_type="route_type"
        class="shadow-none sm:flex hidden"
      />
      <accommodation-list :items="items" />
      <!-- PAGINATION START -->
      <div class="flex flex-wrap justify-center pb-1">
        <div v-if="pagination" class="p-2 w-full">
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
import AccommodationList from "@/Components/Accommodation/Partials/AccommodationList.vue";

const props = defineProps({
  items: Object,
  routes: String,
  heading: String,
  route_parameter: String,
  pagination: Object,
  categories: Object,
  route_type: String,
  hide_search: Boolean,
});
</script>

<style></style>