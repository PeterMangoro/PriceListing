<template>
  <!-- Services Area -->
  <div class="py-2">
    <div
      class="
        px-4
        py-1
        mx-auto
        overflow-hidden
       
        shadow-xl
       
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
              text-slate-50
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
              text-slate-50
              capitalize
            "
          >
            {{ heading + " " + category }} Services
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
              text-slate-50
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
              text-slate-50
              capitalize
            "
          >
            List of all {{ category }} Services
          </h2>
        </span>

        <search-table
          class="items-start p-2"
          :route-name="search_route"
          :route-parameter="category"
          placeholder="Search services..."
        />
      </div>
      <div class="flex flex-wrap justify-around space-x-0.51">
        <Link
          v-for="(item, index) in items"
          :key="index"
          :href="route(routes, item.uuid)"
          class="p-2"
        >
          <div
            class="
              overflow-hidden
              border
              rounded
              shadow-sm
              hover:shadow-2xl hover:-translate-y-1
            "
            :class="{
              [`shadow-red-600 hover:shadow-lg hover:shadow-red-600  shadow-lg`]:
                item.discount,
            }"
          >
            <img
              v-if="item.latest_image"
              :src="item.latest_image"
              :alt="item.title"
              class="object-cover w-28 h-28 hover:scale-110 hover:duration-500"
            />

            <h3 class="p-2 mt-4 text-sm text-slate-50 break-words truncate w-28">
              {{ item.title }}
            </h3>
            <p
              v-if="item.discount"
              class="
                px-2
                mt-2
                text-sm
                font-semibold
                text-slate-50
                break-words
                w-28
              "
            >
              {{ item.discount.price }} ⏰
            </p>
            <p
              v-else
              class="
                px-2
                mt-2
                text-sm
                font-semibold
                text-slate-50
                break-words
                w-28
              "
            >
              {{ item.price }}
            </p>
          </div>
        </Link>
      </div>
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
