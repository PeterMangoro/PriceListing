<template>
  <plot-layout>
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2">
        <div id="plots" v-if="data.plots.data">
          <p class="text-2xl font-extrabold text-slate-50 border-b-2">
            Available Plots by {{ data.owner.name }}
          </p>
          <all-plots
            v-if="data.plots"
            :heading="'All Plots Supplied by ' + data.owner.name"
            :items="data.plots.data"
            :pagination="data.plots.links"
            routes="welcome.plots.owner"
            :route_parameter="data.owner.username"
          />
        </div>
      </div>
    </div>
  </plot-layout>
</template>

<script setup>
import PlotLayout from "@/Layouts/PlotLayout.vue";

import AllPlots from "@/Components/Plot/AllPlots.vue";

const props = defineProps({
  data: Object,
});
</script>

<style></style>