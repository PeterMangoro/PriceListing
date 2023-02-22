<template>
  <plot-layout :title="data.city">
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2">
        <div id="plots" v-if="data.plots.data">
          <p class="text-2xl font-extrabold text-slate-50 border-b-2">
            Available Plots from {{ data.city }}
          </p>
          <all-plots
            v-if="data.plots"
            :heading="'All Plots from ' + data.city"
            :items="data.plots.data"
            :pagination="data.plots.links"
            routes="welcome.plots.city"
            :route_parameter="data.city"
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