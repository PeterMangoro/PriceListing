<template>
  <service-layout>
    <!-- <snack-bar :categories = data.categories /> -->
    <div class="p-4">
      <!-- <aside class=" basis-1/12">
      <div class="sticky top-10">
    <div v-for="category in data.categories" 
       :key="category.id">
       
       <Link
       :href="route('welcome.services.category',category.slug)"
       >
              {{category.title}}
       </Link>
    </div>
       
       
      </div>
    </aside> -->

      <div class="px-2">
        <div id="services" v-if="data.services.data">
          <!-- <p class="text-2xl font-extrabold text-slate-50 border-b-2">
            Available Services by {{ data.owner.name }}
          </p> -->
          <all-services
            v-if="data.services"
            :heading="' Services Supplied by ' + data.owner.name"
            :items="data.services.data"
            :pagination="data.services.links"
            routes="welcome.services.owner"
            :route_parameter="data.owner.username"
          />
        </div>
      </div>
    </div>
  </service-layout>
</template>

<script setup>
import ServiceLayout from "@/Layouts/ServiceLayout.vue";
import FeaturedServices from "@/Components/Service/FeaturedServices.vue";
import FeaturedCategoryServices from "@/Components/Service/FeaturedCategoryServices.vue";
import AllServices from "@/Components/Service/AllServices.vue";
const props = defineProps({
  data: Object,
});
</script>

<style>
</style>