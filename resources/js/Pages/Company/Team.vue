<template>
  <app-layout>
    <section class="mx-auto max-w-7xl">      
      <div class="pt-5 overflow-hidden">
        <div class="container px-4 mx-auto">
          <div class="flex flex-wrap justify-center gap-3 pb-2 mx-auto">
         
            <span>
                <team-details :team=data.employees   />
            </span>
            
          
          </div>
        </div>
      </div>
    </section>
  </app-layout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import AuthSection from "@/Components/Welcome/AuthSection.vue";
import HiringSection from "@/Components/Welcome/HiringSection.vue";
import ProfileDetails from "@/Components/Company/ProfileDetails.vue";
import ContactDetails from "@/Components/Company/ContactDetails.vue";
import TeamDetails from "@/Components/Company/TeamDetails.vue";

import {ref} from 'vue';

const props = defineProps({
  data: Array,
});

</script>

<style></style>
