<template>
    <car-layout title="Car Edit">
      <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div>
            <update-car-insurance-information :insurance="props.data.car_insurance"   />
            <JetSectionBorder />
          </div>
         
        </div>
      </div>
    </car-layout>
  </template>
  <script setup>
  import CarLayout from "@/Layouts/CarLayout.vue";
  import { router } from "@inertiajs/vue3";
  
import UpdateCarInsuranceInformation from "./Partials/Update/UpdateCarInsuranceInformation.vue";

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
      name: "User Cars",
      link: "cars.index",
    },
    {
      name: "Car-Edit",
      link: "cars.edit",
    },
  ];
  </script>
  