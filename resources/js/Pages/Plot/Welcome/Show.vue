<template>
  <plot-layout>
    <div class="flex flex-wrap p-10 justify-evenly">
      <div class="">
        <image-detail-display class="" :images="data.plot.images" />
      </div>
      <div class="sm:w-1/3">
        <plot-details :plot="data.plot" />
      </div>
      <div class="sm:w-1/3 text-slate-50">
        <owner-section
          heading="This product Belongs To"
          :username="data.plot.username"
          :owner="data.plot.owner"
          :contacts="data.plot.contact"
          :documents="data.plot.documents"
        />
      </div>
    </div>

    <div>
      <p class="text-2xl font-extrabold text-slate-50 capitalize border-b-4">
        From the same location
      </p>
      <div id="plots" v-if="data.similar_plots.length">
        <grouped-plots
          v-if="data.similar_plots"
          :items="data.similar_plots"
          routes="welcome.plots.show"
          show_more="welcome.plots.city"
          :type="data.city"
          heading="Check These Out"
        />
      </div>
      <div v-else>
        <no-result-display />
      </div>
    </div>

    <div>
      <p class="text-2xl font-extrabold text-slate-50 border-b-4">
        From the Same Supplier
      </p>
      <div id="plots" v-if="data.owner_plots.length">
        <grouped-plots
          v-if="data.owner_plots"
          :items="data.owner_plots"
          routes="welcome.plots.show"
          show_more="welcome.plots.owner"
          :type="data.plot.username"
          :heading="'More from ' + data.plot.owner"
        />
      </div>
      <div v-else>
        <no-result-display />
      </div>
    </div>
  </plot-layout>
</template>
<script setup>
import PlotLayout from "@/Layouts/PlotLayout.vue";
import OwnerContacts from "@/Components/Shared/Owner/OwnerContacts.vue";
import PlotDetails from "@/Components/Plot/PlotDetails.vue";
import GroupedPlots from "@/Components/Plot/GroupedPlots.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";

const props = defineProps({
  data: Object,
});
</script>