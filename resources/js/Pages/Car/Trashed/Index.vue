<template>
  <car-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-sky-500">
       Trashed Cars
      </h2>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between">
        <search-table
          class="pb-2"
          route-name="cars.index"
          placeholder="Search cars..."
          show_per_page="true"
        />
        <span class="my-auto">
          <button-link
            :link="route('cars.trashed.index')"
            class="pb-2 bg-blue-600"
            >Garage</button-link
          >
        </span>
      </div>

      <Table
        heading="Car Table"
        :pagination="data.cars.links"       
      >
        <template #tableHead>
          <TableHead
            class="cursor-pointer"
            @click="sort('car_make')"
            name="car_make"
            >Title</TableHead
          >
          <TableHead>Rating</TableHead>
          <TableHead>Description</TableHead>
          <TableHead>Preview</TableHead>
          <TableHead class="cursor-pointer" @click="sort('price')" name="price"
            >Price</TableHead
          >
          

          <TableHead class="text-center"></TableHead>
        </template>
        <TableRow v-for="car in data.cars.data" :key="car.id">
          <TableData>
            <span class="font-medium">{{ car.car_make }}</span
            ><br />

            {{ car.car_model }}
          </TableData>
          <TableData>{{ car.ratings }}</TableData>
          <TableData class="w-2/6">
            <span class=""
              ><p
                v-for="(point, index) in car.detail"
                :key="index"
                class="flex gap-1 line-clamp-1"
              >
                <span v-if="index < 3"> - {{ point }} </span>
              </p></span
            ></TableData
          >
          <TableData
            ><img class="w-20 h-20 rounded" :src="car.latest_image"
          /></TableData>

          <TableData>{{ car.price }}</TableData>
         
          <TableData>
            <Button
              class="
                inline-flex
                justify-center
                px-4
                py-2
                text-sm
                font-medium
                text-white
                bg-blue-600
                border border-transparent
                rounded-md
                shadow-sm
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:blue-red-500
              "
              @click="restore_car(car.id)"
              as="button"
              type="button"
              >Restore</Button
            >
          </TableData>
        </TableRow>
      </Table>
      <!-- table End -->
    </div>

    <div v-if="show">
      <delete-confirmation
        :message="message"
        path="cars.destroy"
        :item="car_to_be_deleted"
        @close="show = false"
      />
    </div>
  </car-layout>
</template>
  
  <script setup>
import { ref } from "vue";
import CarLayout from "@/Layouts/CarLayout.vue";
import DeleteConfirmation from "@/Components/Shared/DeleteConfirmation.vue";
import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import { useSort } from "@/Composables/sort.js";
import { router } from "@inertiajs/vue3";

const props = defineProps({
  data: Object,
});
const message =
  "Are you sure you want to delete this car. Deleted cars will not be seen by customers, but can be found in the trash if you want to restore them";

const show = ref(false);
const car_to_be_deleted = ref(null);

function show_delete_confirmation(car) {
  show.value = true;
  car_to_be_deleted.value = car;
}

function sort(column) {
  useSort(column, "cars.index");
}

function restore_car(car) {
  router.get(route("cars.trashed.show", car), {
    errorBag: "restore_car",
    preserveScroll: true,
  });
}
</script>
  