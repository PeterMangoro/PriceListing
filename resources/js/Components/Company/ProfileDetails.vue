<template>
  <div class="pt-4">
    <div class="w-full p-3 bg-white rounded-lg">
      <div class="flex flex-wrap justify-between">
        <div>
          <span class="text-3xl font-bold text-black"> {{ company }}</span>
          <p>Established:  {{profile.date}} </p>

          <span>
            <h1 class="mt-4 text-xl font-semibold text-slate-700">Mission</h1>
            <p class="font-medium">
              {{ profile.mission }}
            </p>
          </span>

          <span>
            <h1 class="mt-4 text-xl font-semibold text-slate-700">Vision</h1>
            <p class="font-medium">
              {{ profile.vision }}
            </p>
          </span>

           <span>
        <h1 class="mt-4 text-xl font-semibold text-slate-700">Values</h1>
        <p class="font-medium"
        v-for="value in profile.values" :key="value.id"
        >
          {{ value}}
        </p>
      </span>
      <span>
        <h1 class="mt-4 text-xl font-semibold text-slate-700">History</h1>
        <p class="w-full font-medium prose text-slate-500">
          {{ profile.history }}
        </p>
      </span>
        </div>
        <div>
          <Link v-if="counts.products > 0" class="flex justify-between gap-5 transition duration-300 ease-in-out border-b hover:scale-105" :href="route('welcome.products.owner',username)" >
            <span>Products:</span>
            <span>{{ counts.products }}</span>
          </Link>
          <Link v-if="counts.services > 0" class="flex justify-between gap-5 transition duration-300 ease-in-out border-b hover:scale-105 " :href="route('welcome.services.owner',username)">
            <span>Services:</span>
            <span>{{ counts.services }}</span>
          </Link>
          <Link v-if="counts.accommodations > 0" class="flex justify-between gap-5 transition duration-300 ease-in-out border-b hover:scale-105" :href="route('welcome.accommodations.owner',username)">
            <span>Accommodations:</span>
            <span>{{ counts.accommodations }}</span>
          </Link>
          <Link v-if="counts.cars > 0" class="flex justify-between gap-5 transition duration-300 ease-in-out border-b hover:scale-105" :href="route('welcome.cars.owner',username)">
            <span>Car Sale:</span>
            <span>{{ counts.cars }}</span>
          </Link>
          <Link v-if="counts.plots > 0" class="flex justify-between gap-5 transition duration-300 ease-in-out border-b hover:scale-105" :href="route('welcome.plots.owner',username)">
            <span>Plots & Farms:</span>
            <span>{{ counts.plots }}</span>
          </Link>
           <document-list
        v-if="profile.documents"
        class="text-black"
          :documents="profile.documents"
          path="attachments.show"
          heading = "Company Documents"
        />
        </div>
      </div>

     

      
    </div>
  </div>
</template>
<script setup>
import DocumentList from "@/Components/Shared/DocumentList.vue";

const props = defineProps({
  profile: Object,
  company: String,
  username: String,
  counts: Object,
});
</script>