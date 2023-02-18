<template>
  <accommodation-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-sky-500">
        Trashed Accommodations
      </h2>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between">
        <search-table
          class="pb-2"
          route-name="accommodations.trashed.index"
          placeholder="Search accommodations..."
          show_per_page="true"
        />
        <span class="my-auto">
          <button-link
            :link="route('accommodations.index')"
            class="pb-2 bg-blue-600"
          >
            Accommodations</button-link
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
            <p
              v-for="(point, index) in accommodation.detail"
              :key="index"
              class="flex gap-1 line-clamp-1"
            >
              <span v-if="index < 3"> - {{ point }} </span>
            </p>
          </TableData>
          <TableData
            ><img class="w-20 h-20 rounded" :src="accommodation.latest_image"
          /></TableData>

          <TableData>{{ accommodation.price }}</TableData>

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
              @click="restore_accommodation(accommodation.id)"
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
import Location from "@/Components/Shared/Location.vue";
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
  "Are you sure you want to delete this accommodation. Deleted accommodations will not be seen by customers, but can be found in the trash if you want to restore them";

function restore_accommodation(accommodation) {
  router.get(route("accommodations.trashed.show", accommodation), {
    errorBag: "restore_accommodation",
    preserveScroll: true,
  });
}

function sort(column) {
  useSort(column, "accommodations.trashed.index");
}
</script>
