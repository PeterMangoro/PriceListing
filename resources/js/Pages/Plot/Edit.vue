<template>
  <plot-layout>
    <bread-crumb :id="data.plot.id" :routes="routes" />

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-plot-address :plot="props.data.plot"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-plot-information :plot="props.data.plot"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-plot-price :plot="props.data.plot" :date = props.data.date />
          <JetSectionBorder />
        </div>
        <!-- <div>
          <update-plot-categories :plot="props.data.plot" :category_types= props.data.category_types />
          <JetSectionBorder />
        </div> -->
        <div>
          <update-plot-images :plot="props.data.plot"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-plot-documents :plot="props.data.plot"  />
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </plot-layout>
</template>
<script setup>
import PlotLayout from "@/Layouts/PlotLayout.vue";
import { router } from "@inertiajs/vue3";

import UpdatePlotInformation from "@/Pages/Plot/Partials/Update/UpdatePlotInformation.vue";
import UpdatePlotPrice from "@/Pages/Plot/Partials/Update/UpdatePlotPrice.vue";
import UpdatePlotCategories from "@/Pages/Plot/Partials/Update/UpdatePlotCategories.vue";
import UpdatePlotImages from "@/Pages/Plot/Partials/Update/UpdatePlotImages.vue";
import UpdatePlotDocuments from "@/Pages/Plot/Partials/Update/UpdatePlotDocuments.vue";
import UpdatePlotAddress from "@/Pages/Plot/Partials/Update/UpdatePlotAddress.vue";
import JetSectionBorder from "@/Components/SectionBorder.vue";
const props = defineProps({
  data: Object,
});


const deleteImage = (attachmentId) => {
  const result = confirm("Delete Image ?");
  if (result) {
    router.delete(route("attachment.delete", attachmentId), {
      preserveScroll: true,
    });
  }
};

const routes = [
  {
    name: "User Plots",
    link: "plots.index",
  },
  {
    name: "Plot-Edit",
    link: "plots.edit",
  },
];
</script>
