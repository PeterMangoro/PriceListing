<template>
  <service-layout>
    <!-- <bread-crumb :id="data.service.id" :routes="routes" /> -->

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-service-information :service="data.service"  />
          <JetSectionBorder />
        </div>
        <div >
          <update-service-price :service="data.service" :date = props.data.date />
          <JetSectionBorder />
        </div>
        <div>
          <update-service-categories :service="data.service" :category_types= props.data.category_types />
          <JetSectionBorder />
        </div>
        <div>
          <update-service-images :service="data.service"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-service-documents :service="data.service"  />
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </service-layout>
</template>
<script setup>
import ServiceLayout from "@/Layouts/ServiceLayout.vue";
import { router  } from "@inertiajs/vue3";
import UpdateServiceInformation from "@/Pages/Service/Partials/Update/UpdateServiceInformation.vue";
import UpdateServicePrice from "@/Pages/Service/Partials/Update/UpdateServicePrice.vue";
import UpdateServiceCategories from "@/Pages/Service/Partials/Update/UpdateServiceCategories.vue";
import UpdateServiceImages from "@/Pages/Service/Partials/Update/UpdateServiceImages.vue";
import UpdateServiceDocuments from "@/Pages/Service/Partials/Update/UpdateServiceDocuments.vue";
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
    name: "User Services",
    link: "services.index",
  },
  {
    name: "Service-Edit",
    link: "services.edit",
  },
];
</script>
