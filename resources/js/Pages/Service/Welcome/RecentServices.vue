<template>
  <service-layout>
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <div class="px-2"></div>

      <div id="services" v-if="data.services.data">
        <p class="text-2xl font-extrabold text-black border-b-2">
          Recently Added Services
        </p>
        <all-services
          v-if="data.services"
          :items="data.services.data"
          :pagination="data.services.links"
          routes="welcome.services.recent"
          :categories="data.category_types"
          route_type="welcome.services.category_type"
        />
      </div>
    </div>
  </service-layout>
</template>
  
  <script setup>
import ServiceLayout from "@/Layouts/ServiceLayout.vue";
import AllServices from "@/Components/Service/AllServices.vue";

const props = defineProps({
  data: Object,
});
</script>
  
  <style>
</style>