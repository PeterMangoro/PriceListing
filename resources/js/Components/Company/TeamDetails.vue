<template>
  <div class="w-full pt-2">
    <div class="flex flex-wrap justify-center gap-5 pb-5">
      <h1 class="mt-4 text-2xl font-semibold underline text-slate-100">
      Meet the Team
    </h1>
    
    </div>
    
    <span>
      <div v-if="team.data"
      class="flex flex-wrap gap-2 justify-evenly"
      >
         <avatar-card
        v-for="employee in team.data"
        :key="employee.id"
        :employee="employee"
      />
      </div>
     <div v-else
     class="flex flex-wrap gap-2 justify-evenly"
     >
      <avatar-card
        v-for="employee in team"
        :key="employee.id"
        :employee="employee"
      />
     </div>
    </span>    
    <div 
    v-if="team_count > 12"
    class="flex">
       <div class="pb-1 m-auto ">
        <Link
          class="inline-flex justify-center px-8 py-2 text-sm font-medium text-black border border-transparent rounded hover:border-green-500"
          :href="route('company_profile.team',username)"
          >Show More
        </Link>
      </div>      
    </div>

     <div v-if="team.links" class="flex flex-wrap justify-center pb-1">
        <div  class="p-2 m-2 bg-white rounded-lg">
          <Pagination :links="team.links" />
        </div>
      </div>
  
  </div>
</template>
<script setup>
import AvatarCard from "@/Components/Shared/AvatarCard.vue";
import Pagination from "@/Components/Shared/Pagination.vue";

const props = defineProps({
  team: Object, 
   team_count: Number,
  username:String
});
</script>