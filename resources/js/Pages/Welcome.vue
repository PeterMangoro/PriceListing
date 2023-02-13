<template>
  <app-layout>
   
    <div class="grid  gap-4 place-content-center min-h-screen ">

      <div class="flex flex-wrap w-auto gap-3 m-auto justify-evenly   ">
      <welcome-card
        emoji="🛍"
        heading="Marketplace"
        detail="Shop from different suppliers at the cheapest price for the highest quality"
        path="welcome.products.index"
      />

      <welcome-card
        emoji=" 🚘"
        heading="Car Sale"
        detail="Find the best car deals and drive the car of your dreams"
        path="welcome.cars.index"
      />

      <welcome-card
        emoji="  🏢"
        heading="Accommodation"
        detail="Find the place you will call home "
        path="welcome.accommodations.index"
      />

      <welcome-card
        emoji="   🏞"
        heading="Real Estate"
        detail="Purchase land for your projects at good strategic locations "
        path="welcome.plots.index"
      />

      <welcome-card
        emoji="   ⏳"
        heading="Services"
        detail="Check out Service provided ranging from fashion design, media, entertainment, car servicing and ..."
        path="welcome.services.index"
      />

      <!-- <welcome-card
        emoji="    🛣"
        heading="Travel & Transport"
        detail="Purchase land for your projects at good strategic locations "
        path="welcome.transports.index"
      /> -->
    </div>
    </div>
    
  </app-layout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import WelcomeCard from "@/Components/Welcome/WelcomeCard.vue";
// import CallToAction from "@/Components/Welcome/CallToAction.vue";
const props = defineProps({
  data: Object,
});
</script>

<style></style>
