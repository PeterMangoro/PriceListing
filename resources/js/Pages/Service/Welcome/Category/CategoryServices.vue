<template>
    <service-layout>
        
      <div class="px-2">
        <div>
          <category-links
            :categories="data.category_types"
            route_type="welcome.services.category_type"
            heading="Explore Different Categories"
          />
        </div>
  
        <div id="services" v-if="data.services.data.length">
          <category-services
            v-if="data.services"
            :items="data.services.data"
            :category="data.category"
            :pagination="data.services.links"
            routes="welcome.services.show"
            search_route="welcome.services.category"
          />
        </div>
  
        <div v-else>
          <no-result-display />
        </div>
        
      </div>
    </service-layout>
  </template>
  
  <script setup>
  import ServiceLayout from "@/Layouts/ServiceLayout.vue";
  import FeaturedServices from "@/Components/Service/FeaturedServices.vue";
  import CategoryServices from "@/Components/Service/CategoryServices.vue";
  import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
  import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
  
  const props = defineProps({
    data: Object,
  });
  </script>
  
  <style>
  </style>