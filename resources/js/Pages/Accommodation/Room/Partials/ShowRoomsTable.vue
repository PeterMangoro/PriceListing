<template>
  <Table heading="Rooms Table" :pagination="rooms.links">
    <template #tableHead>
      <TableHead>Room Name</TableHead>
      <TableHead>Price</TableHead>
      <TableHead>Rating</TableHead>
      <TableHead>Occupant</TableHead>
      <TableHead>Status</TableHead>
      <TableHead class="text-center"></TableHead>
    </template>
    <TableRow v-for="room in rooms.data" :key="room.id">
      <TableData>
        {{ room.room_name }}
        <p>( {{ room.room_type }})</p>
      </TableData>

      <TableData>{{ room.price }}</TableData>
      <TableData>{{ room.ratings }}</TableData>
      <TableData>{{ room.occupant }}</TableData>
      <TableData>
        <span v-if="room.status == 'Available'">Available</span>
        <span class="text-red-500" v-else>Occupied</span>
      </TableData>
      <TableData>
        <div class="flex space-x-1">
          <span v-if="room.status == 'Available'">
            <Button
              class="
                inline-flex
                justify-center
                px-4
                py-2
                text-sm
                font-medium
                text-white
                bg-green-600
                border border-transparent
                rounded-md
                shadow-sm
                hover:bg-green-700
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-red-500
              "
              @click="show_check_in(room)"
              as="button"
              type="button"
              >Check-In</Button
            >
          </span>
          <span v-else>
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
              @click="show_check_out(room)"
              as="button"
              type="button"
              >Check-Out</Button
            >
          </span>
        </div>
      </TableData>
    </TableRow>
  </Table>

  <div v-if="showCheckOut">
    <check-out
      :message="
        'Confirm Checking Out of ' +
        selectedRoom.occupant +
        ' from ' +
        selectedRoom.room_name
      "
      :item="selectedRoom"
      @close="showCheckOut = false"
    />
  </div>
  <div v-if="showCheckIn">
    <check-in
      :item="selectedRoom"
      :parent="parent"
      @close="showCheckIn = false"
    />
  </div>
</template>
<script setup>
import CheckOut from "@/Components/Shared/Room/CheckOut.vue";
import CheckIn from "@/Components/Shared/Room/CheckIn.vue";
import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import { useSort } from "@/Composables/sort.js";
import { ref } from "vue";

const props = defineProps({
  rooms: Object,
  parent: String,
});

const showCheckOut = ref(false);
const showCheckIn = ref(false);
const selectedRoom = ref(null);

function show_check_in(room) {
  showCheckOut.value = false;
  showCheckIn.value = true;
  selectedRoom.value = room;
}

function show_check_out(room) {
  showCheckIn.value = false;
  showCheckOut.value = true;
  selectedRoom.value = room;
}
</script>