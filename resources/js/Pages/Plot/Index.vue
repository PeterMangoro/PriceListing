<template>
  <plot-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-sky-500">
        Estate Dashboard
      </h2>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <search-table
        class="pb-2"
        route-name="plots.index"
        placeholder="Search plots..."
        show_per_page="true"
      />
      <Table
        heading="Plot Table"
        :pagination="data.plots.links"
        path="plots.create"
        button="Add new Plot"
      >
        <template #tableHead>
          <TableHead>Location</TableHead>
          <TableHead class="cursor-pointer" @click="sort('size')" name="size"
            >Size</TableHead
          >
          <TableHead>Description</TableHead>
          <TableHead class="cursor-pointer" @click="sort('price')" name="price"
            >Price</TableHead
          >
          <TableHead>Status</TableHead>

          <TableHead class="text-center"></TableHead>
        </template>
        <TableRow v-for="plot in data.plots.data" :key="plot.id">
          <TableData>
            <location :location="plot.location" :tag="false" />
          </TableData>
          <TableData>{{ plot.size }}</TableData>
          <TableData class="w-2/6">
            <span class=""
              ><p
                v-for="(point, index) in plot.detail"
                :key="index"
                class="flex gap-1 line-clamp-1"
              >
                <span v-if="index < 3"> - {{ point }} </span>
              </p></span
            >
          </TableData>

          <TableData>{{ plot.price }}</TableData>
          <TableData>
            <span v-if="plot.status === 'For Sale'">Available</span>
            <span class="text-red-500" v-else>Not Available</span>
          </TableData>
          <TableData>
            <div class="flex space-x-1">
              <ButtonLink
                class="bg-blue-500 hover:bg-blue-700"
                :link="route('plots.edit', plot.uuid)"
                >View</ButtonLink
              >
              <Button
                class="
                  inline-flex
                  justify-center
                  px-4
                  py-2
                  text-sm
                  font-medium
                  text-white
                  bg-red-600
                  border border-transparent
                  rounded-md
                  shadow-sm
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-red-500
                "
                @click="show_delete_confirmation(plot.id)"
                as="button"
                type="button"
                >Suspend</Button
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

import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import JetInput from "@/Components/TextInput.vue";
import DeleteConfirmation from "@/Components/Shared/DeleteConfirmation.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import Location from "@/Components/Shared/Location.vue";
import { useSort } from "@/Composables/sort.js";

const props = defineProps({
  data: Object,
});
const message =
  "Are you sure you want to delete this property, and can not be restored";

const show = ref(false);
const plot_to_be_deleted = ref(null);

function show_delete_confirmation(plot) {
  show.value = true;
  plot_to_be_deleted.value = plot;
}
function sort(column) {
  useSort(column, "plots.index");
}
</script>
