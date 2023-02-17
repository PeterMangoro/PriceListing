<template>
  <accommodation-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-black">
        Accommodation Dashboard
      </h2>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between">
        <search-table
          class="pb-2"
          route-name="accommodations.index"
          placeholder="Search accommodations..."
          show_per_page="true"
        />
        <span class="my-auto">
          <button-link
            :link="route('accommodations.trashed.index')"
            class="pb-2 bg-slate-600"
            >Deleted Accommodations</button-link
          >
        </span>
      </div>

      <Table
        heading="Accommodation Table"
        :pagination="data.accommodations.links"
        path="accommodations.create"
        button="Add new Accommodation"
      >
        <template #tableHead>
          <TableHead>Address</TableHead>
          <TableHead>Rating</TableHead>
          <TableHead>Description</TableHead>
          <TableHead>Preview</TableHead>
          <TableHead class="cursor-pointer" @click="sort('price')" name="price"
            >Price</TableHead
          >
          <TableHead
            class="cursor-pointer"
            @click="sort('sale_status')"
            name="sale_status"
            >Status</TableHead
          >

          <TableHead class="text-center"></TableHead>
        </template>
        <TableRow
          v-for="accommodation in data.accommodations.data"
          :key="accommodation.id"
        >
          <TableData>
            <location :location="accommodation.address" :tag="false" />
          </TableData>
          <TableData>{{ accommodation.ratings }}</TableData>
          <TableData class="w-2/6">
            <span class="line-clamp-3">{{
              accommodation.detail
            }}</span></TableData
          >
          <TableData
            ><img class="w-20 h-20 rounded" :src="accommodation.latest_image"
          /></TableData>

          <TableData>{{ accommodation.price }}</TableData>
          <TableData>
            <span v-if="accommodation.status == 'For Sale'">Available</span>
            <span class="text-red-500" v-else>Not Available</span>
          </TableData>
          <TableData>
            <div class="flex space-x-1">
              <ButtonLink
                class=""
                :link="route('accommodations.edit', accommodation.uuid)"
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
                @click="show_delete_confirmation(accommodation.id)"
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
        path="accommodations.destroy"
        :item="accommodation_to_be_deleted"
        @close="show = false"
      />
    </div>
  </accommodation-layout>
</template>

<script setup>
import { ref } from "vue";
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";

import DeleteConfirmation from "@/Components/Shared/DeleteConfirmation.vue";
import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import { useSort } from "@/Composables/sort.js";
import Location from "@/Components/Shared/Location.vue";

const props = defineProps({
  data: Object,
});
const message =
  "Are you sure you want to delete this accommodation. Deleted accommodations will not be seen by customers, but can be found in the trash if you want to restore them";

const show = ref(false);
const accommodation_to_be_deleted = ref(null);

function show_delete_confirmation(accommodation) {
  show.value = true;
  accommodation_to_be_deleted.value = accommodation;
}

function sort(column) {
  useSort(column, "accommodations.index");
}
</script>