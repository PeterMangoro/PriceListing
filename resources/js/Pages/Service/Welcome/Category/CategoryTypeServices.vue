<template>
  <service-layout>
    <!-- <snack-bar :categories = data.categories /> -->

    <div class="px-2">
      <div>
        <category-links
          :categories="data.category_types"
          route_type="welcome.services.category_type"
          heading="Explore Different Categories"
        />
      </div>

      <div id="services" v-if="data.services.data.length">
        <all-services
          v-if="data.services"
          :heading="data.category_type + ' Services'"
          :items="data.services.data"
          :pagination="data.services.links"
          routes="welcome.services.category_type"
          :route_parameter="data.category_type"
          :categories="data.categories"
          route_type="welcome.services.category"
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
import AllServices from "@/Components/Service/AllServices.vue";
import CategoryLinks from "@/Components/Shared/Category/CategoryLinks.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>