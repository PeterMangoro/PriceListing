<template>
  <plot-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-black">
        Estate Dashboard
      </h2>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between">
        <search-table
          class="pb-2"
          route-name="plots.trashed.index"
          placeholder="Search plots..."
          show_per_page="true"
        />
        <span class="my-auto">
          <button-link :link="route('plots.index')" class="pb-2 bg-blue-600">
            Plots</button-link
          >
        </span>
      </div>

      <Table heading="Plot Table" :pagination="data.plots.links">
        <template #tableHead>
          <TableHead class="cursor-pointer" @click="sort('title')" name="title"
            >Title</TableHead
          >
          <TableHead>Rating</TableHead>
          <TableHead>Description</TableHead>
          <TableHead>Preview</TableHead>
          <TableHead class="cursor-pointer" @click="sort('price')" name="price"
            >Price</TableHead
          >
          <!-- <TableHead class="cursor-pointer" @click="sort('sale_status')" name='sale_status'>Status</TableHead> -->

          <TableHead class="text-center"></TableHead>
        </template>
        <TableRow v-for="plot in data.plots.data" :key="plot.id">
          <TableData>{{ plot.title }}</TableData>
          <TableData>{{ plot.ratings }}</TableData>
          <TableData class="w-2/6">
            <span class="line-clamp-3">{{ plot.detail }}</span>
          </TableData>
          <TableData
            ><img class="w-20 h-20 rounded" :src="plot.latest_image"
          /></TableData>

          <TableData>{{ plot.price }}</TableData>
          <!-- <TableData>
                                <span v-if="plot.status == 'For Sale'">Available</span>
                                <span class="text-red-500" v-else>Not Available</span>
                            </TableData> -->
          <TableData>
            <div class="flex space-x-1">
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
                @click="restore_plot(plot.id)"
                as="button"
                type="button"
                >Restore</Button
              >
            </div>
          </TableData>
        </TableRow>
      </Table>
      <!-- table End -->
    </div>

    <div v-if="show">
      <delete-confirmation
        :message="message"
        path="plots.destroy"
        :item="plot_to_be_deleted"
        @close="show = false"
      />
    </div>
  </plot-layout>
</template>

<script setup>
import { ref } from "vue";
import PlotLayout from "@/Layouts/PlotLayout.vue";

import DeleteConfirmation from "@/Components/Shared/DeleteConfirmation.vue";
import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import { useSort } from "@/Composables/sort.js";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
  data: Object,
});

const form = useForm();
const message =
  "Are you sure you want to delete this plot. Deleted plots will not be seen by customers, but can be found in the trash if you want to restore them";

function restore_plot(plot) {
  form.get(route("plots.trashed.show", plot), {
    errorBag: "restore_plot",
    preserveScroll: true,
  });
}

function sort(column) {
  useSort(column, "plots.trashed.index");
}
</script>
