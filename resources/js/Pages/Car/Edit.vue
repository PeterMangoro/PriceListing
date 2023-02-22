<template>
    <car-layout title="Car Edit">
      <bread-crumb :id="data.car.id" :routes="routes" />
  
      <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div>
            <update-car-information :car="props.data.car" :car_makes="data.car_makes"  />
            <JetSectionBorder />
          </div>
          <div>
            <update-car-price :car="props.data.car" :date = props.data.date />
            <JetSectionBorder />
          </div>
       
          <div>
            <update-car-images :car="props.data.car"  />
            <JetSectionBorder />
          </div>
          <div>
            <update-car-documents :car="props.data.car"  />
            <JetSectionBorder />
          </div>
        </div>
      </div>
    </car-layout>
  </template>
  <script setup>
  import CarLayout from "@/Layouts/CarLayout.vue";
  import { router } from "@inertiajs/vue3";
  

  import UpdateCarInformation from "@/Pages/Car/Partials/Update/UpdateCarInformation.vue";
  import UpdateCarPrice from "@/Pages/Car/Partials/Update/UpdateCarPrice.vue";
  
  import UpdateCarImages from "@/Pages/Car/Partials/Update/UpdateCarImages.vue";
  import UpdateCarDocuments from "@/Pages/Car/Partials/Update/UpdateCarDocuments.vue";
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
  