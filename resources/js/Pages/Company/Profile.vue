<template>
  <app-layout>
    <section class="mx-auto max-w-7xl">      
      <div class="pt-5 overflow-hidden">
        <div class="container px-4 mx-auto">
          <div class="flex flex-wrap justify-center gap-3 pb-2 mx-auto">
            <span 
            :class="{ [ `shadow-sky-600 hover:shadow-lg hover:shadow-sky-600  shadow-lg`]: profile }"
            class="p-2 bg-white hover:shadow-sky-600 rounded-lg hover:cursor-pointer hover:bg-slate-200 hover:text-black" @click = 
            
            showProfile()>Company Profile</span>
            <span 
            :class="{ [ `shadow-sky-600 hover:shadow-lg hover:shadow-sky-600  shadow-lg`]: contacts }"
            class="p-2 bg-white rounded-lg hover:shadow-sky-600 hover:cursor-pointer hover:shadow-lg hover:bg-slate-200 hover:text-black" @click = 
            
            showContacts()>Contact Details</span>
            <span 
            :class="{ [ `shadow-sky-600 hover:shadow-lg hover:shadow-sky-600  shadow-lg`]: team }"
            class="p-2 bg-white rounded-lg hover:cursor-pointer hover:shadow-lg hover:shadow-sky-600 hover:bg-slate-200 hover:text-black" @click = 
            
            showTeam()>Company Team</span>
          </div>
          <div class="m-auto ">
            <span
            
             v-if="profile">
                <profile-details :profile=data.profile :company=data.company.name  :username=data.company.username :counts=data.counts />
            </span>
          
             <span
             
              v-if="contacts">
                <contact-details :contacts=data.contacts :address=data.address />
            </span>
            
            <span
            
             v-if="team">
                <team-details :team=data.employees  :username=data.company.username :team_count=data.counts.employees />
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

const team = ref(false)
const profile = ref(true)
const contacts = ref(false)

function showTeam() {
  team.value = true,
  profile.value = false,
  contacts.value = false
}

function showProfile() {
  team.value = false,
  profile.value = true,
  contacts.value = false
}

function showContacts() {
  team.value = false,
  profile.value = false,
  contacts.value = true
}
</script>

<style></style>
