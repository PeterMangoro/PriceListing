<template>
  <accommodation-layout>
    <bread-crumb :id="data.accommodation.id" :routes="routes" />

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-accommodation-information
            :accommodation="props.data.accommodation"
          />
          <JetSectionBorder />
        </div>
        <div>
          <update-accommodation-price
            :accommodation="props.data.accommodation"
            :date="props.data.date"
          />
          <JetSectionBorder />
        </div>
        <div>
          <update-accommodation-categories
            :accommodation="props.data.accommodation"
            :category_types="props.data.category_types"
          />
          <JetSectionBorder />
        </div>
        <div>
          <update-accommodation-images
            :accommodation="props.data.accommodation"
          />
          <JetSectionBorder />
        </div>
        <div>
          <update-accommodation-documents
            :accommodation="props.data.accommodation"
          />
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </accommodation-layout>
</template>
<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";

import UpdateAccommodationInformation from "@/Pagesvue3/Accommodation/Partials/UpdateAccommodationInformation.vue";
import UpdateAccommodationPrice from "@/Pagesvue3/Accommodation/Partials/UpdateAccommodationPrice.vue";
import UpdateAccommodationCategories from "@/Pagesvue3/Accommodation/Partials/UpdateAccommodationCategories.vue";
import UpdateAccommodationImages from "@/Pagesvue3/Accommodation/Partials/UpdateAccommodationImages.vue";
import UpdateAccommodationDocuments from "@/Pagesvue3/Accommodation/Partials/UpdateAccommodationDocuments.vue";
import JetSectionBorder from "@/Components/SectionBorder.vue";
const props = defineProps({
  data: Object,
});

const deleteImage = (attachmentId) => {
  const result = confirm("Delete Image ?");
  if (result) {
    Inertia.delete(route("attachment.delete", attachmentId), {
      preserveScroll: true,
    });
  }
};

const routes = [
  {
    name: "User Accommodations",
    link: "accommodations.index",
  },
  {
    name: "Accommodation-Edit",
    link: "accommodations.edit",
  },
];
</script>
