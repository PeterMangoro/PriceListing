<template>
  <service-layout>
    <div class="p-4">
      <div class="px-2">
        <!-- <div id="services" class="flex flex-wrap px-20 justify-evenly">
          <div v-if="data.pool.recent_services.length ">
            <featured-services
              heading="Recent Arrivals 📦"
              :items="data.pool.recent_services"
              routes="welcome.services.show"
              show_more="welcome.services.recent"
            />
          </div>

          <div v-if="data.pool.featured_services.length ">
            <featured-services
              heading="Featured Services 🛍"
              :items="data.pool.featured_services"
              routes="welcome.services.show"
              show_more="welcome.services.featured"
            />
          </div>

          <div v-if="data.pool.top_talks.length ">
            <featured-services
              heading="Top Talks 🛒"
              :items="data.pool.top_talks"
              routes="welcome.services.show"
              show_more="welcome.services.top_talks"
            />
          </div>

          <div v-if="data.pool.discounted_services.length ">
            <featured-services
              heading="Discounted For You  💰"
              :items="data.pool.discounted_services"
              routes="welcome.services.show"
              show_more="welcome.services.discounted"
            />
          </div>
        </div> -->

        <div id="services" v-if="data.services.data">
          <p class="text-2xl font-extrabold text-slate-50 border-b-2">
            Available Services
          </p>
          <div v-if="data.services.data.length">
            <all-services
              :items="data.services.data"
              :pagination="data.services.links"
              routes="welcome.services.index"
              :categories="data.category_types"
              route_type="welcome.services.category_type"
            />
          </div>
          <div v-else>
            <no-result-display />
          </div>
        </div>
      </div>
    </div>
  </service-layout>
</template>

<script setup>
import ServiceLayout from "@/Layouts/ServiceLayout.vue";
import FeaturedServices from "@/Components/Service/FeaturedServices.vue";
import AllServices from "@/Components/Service/AllServices.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>