<template>
  <accommodation-layout>
    <section class="py-8">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap justify-evenly">
          <dashboard-card
            title="Rooms"
            :total="data.counts.rooms"
            add_path="accommodations.rooms.create"
            :add_parameter="data.parent.uuid"
            add_tip="Click to Add a new Room"
          />

          <dashboard-card
            title="Total Today"
            :total="data.counts.total_today"
            more_path="accommodations.payments.today"
            :more_parameter="data.parent.uuid"
            more_tip="Click to View today's payments"
          />

          <dashboard-card
            title="Total This Week"
            :total="data.counts.total_week"
            more_path="accommodations.payments.week"
            :more_parameter="data.parent.uuid"
            more_tip="Click to View this week's payments"
          />

          <dashboard-card
            title="Total This Month"
            :total="data.counts.total_month"
            more_path="accommodations.payments.month"
            :more_parameter="data.parent.uuid"
            more_tip="Click to View this month's payments"
          />
          <dashboard-card
            title="Total Annual Income"
            :total="data.counts.total_year"
            more_path="accommodations.payments.year"
            :more_parameter="data.parent.uuid"
            more_tip="Click to View this year's payments"
          />
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <!-- Table -->
          <div class="flex flex-wrap justify-between">
            <search-table
              class="pb-2"
              route-name="accommodations.index"
              placeholder="Search rooms..."
              show_per_page="true"
            />
          </div>

          <show-rooms-table :rooms="data.rooms" :parent="data.parent.uuid" />
          <!-- table End -->
        </div>
      </div>
    </section>
  </accommodation-layout>
</template>

<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import dashboardCard from "@/Components/dashboardCard.vue";
import { ref } from "vue";

import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import Location from "@/Components/Shared/Location.vue";
import ShowRoomsTable from "@/Pagesvue3/Accommodation/Room/Partials/ShowRoomsTable.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>