<template>
  <plot-layout>
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2">
        <!-- <div
              id="plots"
              class="flex flex-wrap px-20 justify-evenly"
              v-if="data.pool.featured_plots"
            > -->
        <!-- <div>
                <featured-plots
                  heading="Recently Added ⏳"
                  :items="data.pool.recent_plots"
                  routes="welcome.plots.show"
                />
              </div> -->

        <!-- <div>
                <featured-plots
                  heading="Featured Plots  💯"
                  :items="data.pool.featured_plots"
                  routes="welcome.plots.show"
                />
              </div> -->

        <!-- </div> -->

        <div id="plots" v-if="data.plots.data">
          <p class="text-2xl font-extrabold text-slate-50 border-b-2">
            Available Plots
          </p>
          <all-plots
            v-if="data.plots"
            :items="data.plots.data"
            :pagination="data.plots.links"
            routes="welcome.plots.index"
          />
        </div>
      </div>
    </div>
  </plot-layout>
</template>

<script setup>
import PlotLayout from "@/Layouts/PlotLayout.vue";

import AllPlots from "@/Components/Plot/AllPlots.vue";
import GroupedPlots from "@/Components/Plot/GroupedPlots.vue";

// Inertia.reload({
//   only: ['data.plots'],
//   preserveScroll: true })

const props = defineProps({
  data: Object,
});
</script>

<style></style>