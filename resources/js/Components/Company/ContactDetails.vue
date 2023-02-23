<template>
  <div class="pt-4">
    
      <h1 class="mb-2 text-2xl font-semibold capitalize text-slate-50">
        Contact details
      </h1>
      <span>
        <div
          v-for="contact in contacts"
          :key="contact.id"
          class="flex flex-wrap text-slate-50 justify-start gap-4"
        >
          <p class="font-medium">{{ contact.account }}:</p>
          <!-- <p>@{{ contact.username }}</p> -->
          <p>{{ contact.handle }}</p>
        </div>
      </span>
      <span class="flex flex-wrap gap-4 my-5">
        <span class="text-2xl"> 🏢</span>
        <div class="text-slate-50">
          <p> {{ address.street }}</p>
         <p>{{ address.town }}</p>
         <p>{{ address.city }}</p>
         <p>{{ address.country }}</p>
           
        </div>
      </span>
    </div>
 
</template>
<script setup>
const props = defineProps({
  contacts: Object,
  address:Object
});
</script>