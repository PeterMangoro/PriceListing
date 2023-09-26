<template>
  <car-layout title="Garage Dashboard">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-sky-500">
        Garage Dashboard
      </h2>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between pb-2">
        <search-table
          class="pb-2"
          route-name="car-insurance.index"
          placeholder="Search insurances..."
          show_per_page="true"
        />
        <span class="my-auto">
          <!-- <button-link
            :link="route('car-insurance.trashed.index')"
            class=" bg-slate-600"
            >Deleted Cars</button-link
          > -->
        </span>
      </div>

      <Table
        heading="Insurance Table"
        :pagination="data.insurances.links"
        path="car-insurance.create"
        button="Add new Insurance"
      >
        <template #tableHead>
          <TableHead
            class="cursor-pointer"
            @click="sort('owner')"
            name="owner"
            >Owner</TableHead
          >
          <TableHead class="hidden sm:table-cell">Payment</TableHead>
          <TableHead class="hidden sm:table-cell">Car</TableHead>
          <TableHead class="hidden sm:table-cell">Number-Plate</TableHead>
          <TableHead class="cursor-pointer hidden sm:table-cell" @click="sort('reg_exp')" name="reg_exp"
            >Expiry Date</TableHead
          >
          <TableHead class="cursor-pointer hidden sm:table-cell" @click="sort('reg_date')" name="reg_date"
            >Registration Date</TableHead
          >
          <!-- <TableHead
            class="cursor-pointer hidden sm:table-cell"
            @click="sort('sale_status')"
            name="sale_status"
            >Status</TableHead
          > -->

          <TableHead class="text-center"></TableHead>
        </template>
        <TableRow v-for="insurance in data.insurances.data" :key="insurance.id">
          <TableData>
            <span class="font-medium">{{ insurance.owner }}</span
            >
          </TableData>
          <TableData class="hidden sm:table-cell">
            <p v-for="payment in insurance.payment" :key="payment">
              <span v-if="payment "> - {{ payment }} </span>
            </p>
            </TableData>
          <TableData class="w-auto hidden sm:table-cell">
            {{ insurance.car_title }}</TableData
          >
          <TableData class="hidden sm:table-cell"
            >{{ insurance.car_reg }}</TableData>

          <TableData class="hidden sm:table-cell">
            {{ insurance.reg_exp }}
            
          </TableData>
          <TableData class="hidden sm:table-cell">
            {{ insurance.reg_date }}
          </TableData>
          <TableData>
            <div class="flex space-x-1">
              <ButtonLink class="" :link="route('car-insurance.edit', insurance.uuid)"
                >View</ButtonLink
              >
              <Button
                class="
                  inline-flex
                  justify-center
                  px-3
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
                @click="show_delete_confirmation(insurance.id)"
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
        path="car-insurance.destroy"
        :item="insurance_to_be_deleted"
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

const props = defineProps({
  data: Object,
});
const message =
  "Are you sure you want to delete this insurance. Deleted insurances will not be seen by customers, but can be found in the trash if you want to restore them";

const show = ref(false);
const insurance_to_be_deleted = ref(null);

function show_delete_confirmation(insurance) {
  show.value = true;
  insurance_to_be_deleted.value = insurance;
}

function sort(column) {
  useSort(column, "car-insurance.index");
}
</script>
  