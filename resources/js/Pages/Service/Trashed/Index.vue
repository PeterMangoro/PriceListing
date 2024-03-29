<template>
    <service-layout title="Trashed Service">
      <template #header>
        <h2 class="text-xl font-semibold leading-tight text-slate-50">
          Trashed Services
        </h2>
      </template>
      <!-- <bread-crumb :routes="routes" /> -->
  
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Table -->
        <div class="flex flex-wrap justify-between">
          <search-table
            class="pb-2"
            route-name="services.trashed.index"
            placeholder="Search services..."
            show_per_page="true"
          />
          <span class="my-auto">
            <button-link
              :link="route('services.trashed.index')"
              class="pb-2 bg-blue-600"
              >Services</button-link
            >
          </span>
        </div>
  
        <Table
          heading="Service Table"
          :pagination="data.services.links"
         
        >
          <template #tableHead>
            <TableHead class="cursor-pointer" @click="sort('title')" name="title"
              >Title</TableHead
            >
            <!-- <TableHead>Rating</TableHead> -->
            <TableHead>Description</TableHead>
            <TableHead>Preview</TableHead>
            <!-- <TableHead class="cursor-pointer" @click="sort('price')" name="price"
              >Price</TableHead
            > -->
            <TableHead
              class="cursor-pointer"
              @click="sort('sale_status')"
              name="sale_status"
              >Status</TableHead
            >
  
            <TableHead class="text-center"></TableHead>
          </template>
  
          <TableRow v-for="service in data.services.data" :key="service.id">
            <TableData>{{ service.title }}</TableData>
            <!-- <TableData>{{ service.ratings }}</TableData> -->
            <TableData class="w-2/6">
              <p
              v-for="(point, index) in service.detail"
              :key="index"
              class="flex gap-1 line-clamp-1"
            >
              <span v-if="index < 3"> - {{ point }} </span>
            </p></TableData
            >
            <TableData
              ><img class="w-20 h-20 rounded" :src="service.latest_image"
            /></TableData>
  
            <!-- <TableData>{{ service.price }}</TableData> -->
            <TableData>
              <span v-if="service.status == 'For Sale'">Available</span>
              <span class="text-red-500" v-else>Not Available</span>
            </TableData>
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
              @click="restore_service(service.id)"
              as="button"
              type="button"
              >Restore</Button
            >
            </TableData>
          </TableRow>
        </Table>
        <span class="w-full" v-if="data.services.data.length == 0">
          <no-result-display />
        </span>
  
        <!-- table End -->
      </div>
  
      <div v-if="show">
        <delete-confirmation
          :message="message"
          path="services.destroy"
          :item="service_to_be_deleted"
          @close="show = false"
        />
      </div>
    </service-layout>
  </template>
  
  <script setup>
  import { ref } from "vue";
  import ServiceLayout from "@/Layouts/ServiceLayout.vue";
  import BreadCrumb from "@/Components/Shared/BreadCrumb.vue";
  import DeleteConfirmation from "@/Components/Shared/DeleteConfirmation.vue";
  import Table from "@/Components/Shared/Table/Table.vue";
  import TableData from "@/Components/Shared/Table/TableData.vue";
  import TableHead from "@/Components/Shared/Table/TableHead.vue";
  import TableRow from "@/Components/Shared/Table/TableRow.vue";
  import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
  import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
  import { useSort } from "@/Composables/sort.js";
  import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
  import { router } from "@inertiajs/vue3";

  const props = defineProps({
    data: Object,
  });
  const message =
    "Are you sure you want to delete this service. Deleted services will not be seen by customers, but can be found in the trash if you want to restore them";
  
  const show = ref(false);
  const service_to_be_deleted = ref(null);
  
  function show_delete_confirmation(service) {
    show.value = true;
    service_to_be_deleted.value = service;
  }
  
  function sort(column) {
    useSort(column, "services.index");
  }

  function restore_service(service) {
  router.get(route("services.trashed.show", service), {
    errorBag: "restore_service",
    preserveScroll: true,
  });
}
  </script>
  