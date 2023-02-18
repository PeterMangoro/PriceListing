<template>
    <product-layout>
      <template #header>
        <h2 class="text-xl font-semibold leading-tight text-sky-500">
          Trashed Products
        </h2>
      </template>
      <!-- <bread-crumb :routes="routes" /> -->
  
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Table -->
        <div class="flex flex-wrap justify-between">
          <search-table
            class="pb-2"
            route-name="products.trashed.index"
            placeholder="Search products..."
            show_per_page="true"
          />
          <span class="my-auto">
            <button-link
              :link="route('products.index')"
              class="pb-2 bg-blue-600"
              > Products</button-link
            >
          </span>
        </div>
  
        <Table
          heading="Product Table"
          :pagination="data.products.links"
        
        >
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
            <TableHead
              class="cursor-pointer"
              @click="sort('sale_status')"
              name="sale_status"
              >Status</TableHead
            >
  
            <TableHead class="text-center"></TableHead>
          </template>
  
          <TableRow v-for="product in data.products.data" :key="product.id">
            <TableData>{{ product.title }}</TableData>
            <TableData>{{ product.ratings }}</TableData>
            <TableData class="w-2/6">
              <p
                v-for="(point, index) in product.detail"
                :key="index"
                class="flex gap-1 line-clamp-1"
              >
                <span v-if="index < 3"> - {{ point }} </span>
              </p></TableData
            >
            <TableData
              ><img class="w-20 h-20 rounded" :src="product.latest_image"
            /></TableData>
  
            <TableData>{{ product.price }}</TableData>
            <TableData>
              <span v-if="product.status == 'For Sale'">Available</span>
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
              @click="restore_product(product.id)"
              as="button"
              type="button"
              >Restore</Button
            >
            </TableData>
          </TableRow>
        </Table>
        <span class="w-full" v-if="data.products.data.length == 0">
          <no-result-display />
        </span>
  
        <!-- table End -->
      </div>
  
      <div v-if="show">
        <delete-confirmation
          :message="message"
          path="products.destroy"
          :item="product_to_be_deleted"
          @close="show = false"
        />
      </div>
    </product-layout>
  </template>
    
    <script setup>
  import { ref } from "vue";
  import ProductLayout from "@/Layouts/ProductLayout.vue";
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
    "Are you sure you want to delete this product. Deleted products will not be seen by customers, but can be found in the trash if you want to restore them";
  
  const show = ref(false);
  const product_to_be_deleted = ref(null);
  
  function show_delete_confirmation(product) {
    show.value = true;
    product_to_be_deleted.value = product;
  }
  
  function sort(column) {
    useSort(column, "products.index");
  }

  function restore_product(product) {
  router.get(route("products.trashed.show", product), {
    errorBag: "restore_product",
    preserveScroll: true,
  });
}
  </script>
    