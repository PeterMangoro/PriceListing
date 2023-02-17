<template>
  <!-- Plots Area -->
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
          List of all Plots
        </h2> -->

        <search-table
          class="items-start p-2"
          :route-name="routes"
          :route-parameter="route_parameter"
          placeholder="Search plots..."
        />
      </div>

      <div class="flex flex-wrap justify-around gap-4">
        <Link
          v-for="(item, index) in items"
          :key="index"
          :href="route('welcome.plots.show', item.uuid)"
          class="
            w-56
            h-40
            p-2
            transition
            duration-300
            ease-in-out
          bg-slate-100
            shadow
            bg-opacity-60
            rounded-xl
            hover:scale-105 hover:bg-slate-100
          "
        >
          <div class="flex flex-col justify-between h-full">
            <div class="block mb-2">
              <div class="flex flex-wrap mb-2 -m-2">
                <div class="w-auto p-2">
                  <h3 class="font-semibold leading-normal text-black">
                    {{ item.location.street }}
                  </h3>
                  <h3 class="font-medium leading-normal text-black">
                    {{ item.location.city }}
                  </h3>
                </div>
              </div>
              <p class="text-lg font-medium text-black">{{ item.price }}</p>
              <p class="text-base text-black">{{ item.size }}</p>
            </div>
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
  heading: String,
  route_parameter: String,
  pagination: Object,
});
</script>

<style></style>
