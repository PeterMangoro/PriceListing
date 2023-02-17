<template>
  <accommodation-layout>
    <Table heading="Rooms Table" :pagination="data.payments.links">
      <template #tableHead>
        <TableHead>Room Name</TableHead>
        <TableHead>Occupant</TableHead>
        <TableHead>Price</TableHead>
        <TableHead>Services</TableHead>
        <TableHead>Date</TableHead>
        <TableHead class="text-center"></TableHead>
      </template>
      <TableRow v-for="room in data.payments.data" :key="room.id">
        <TableData>
          {{ room.room_name }}
        </TableData>

        <TableData>{{ room.name }}</TableData>
        <TableData>{{ room.amount }}</TableData>
        <TableData>{{ room.service }}</TableData>
        <TableData>
          {{ room.date }}
        </TableData>
      </TableRow>
    </Table>
  </accommodation-layout>
</template>
<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import CheckOut from "@/Components/Shared/Room/CheckOut.vue";
import CheckIn from "@/Components/Shared/Room/CheckIn.vue";
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
</script>