<template>
  <!-- Cars Area -->
  <div class="py-2">
    <div
      class="
        px-4
        py-1
        mx-auto
        overflow-hidden
        shadow-xl
        sm:py-1 sm:px-6
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
            text-slate-50
            capitalize
          "
        >
          {{ heading }}
        </h2>
        <!-- <h2
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
          List of all Cars
        </h2> -->

        <search-table
          v-if="!hide_search"
          class="items-start p-2"
          :route-name="routes"
          :route-parameter="route_parameter"
          placeholder="Search cars..."
        />
      </div>

      <!-- <div v-if="categories">
        <category-links
          :categories="categories"
          :route_type="route_type"
          class="shadow-none hidden sm:flex"
        />
      </div> -->

      <div class="flex flex-wrap justify-around space-x-0.51">
        <Link
          v-for="(item, index) in items"
          :key="index"
          :href="route('welcome.cars.show', item.uuid)"
          class="p-2"
        >
          <div
            class="
              overflow-hidden
              rounded
              shadow-xl
              w-56
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
              :alt="item.car_make"
              class="object-cover w-56 h-56 hover:scale-105 hover:duration-500"
            />

            <h3
              class="px-2 mt-2 text-sm text-slate-50 break-words truncate w-56"
            >
              {{ item.car_make }}
            </h3>
            <h3
              class="px-2 mt-2 text-sm text-slate-50 break-words truncate w-56"
            >
              {{ item.car_model }}
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
                w-56
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
                w-56
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
import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";

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
