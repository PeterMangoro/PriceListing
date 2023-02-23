<template >
  <div class="pt-4">

   
      
      <div class="text-center">
       
        <div>
          <h1 class="text-3xl font-bold text-slate-50  text-left"> {{ company }}</h1>
          <!-- <p>Established:  {{profile.date}} </p> -->
          
          <span v-if="profile.mission">
            <h1 class="mt-4 text-xl font-semibold text-slate-50">Our Mission :</h1>
            <p class="font-medium text-slate-100">
              {{ profile.mission }}
            </p>
          </span>

          <span v-if="profile.vision">
            <h1 class="mt-4 text-xl font-semibold text-slate-50">Vision :</h1>
            <p class="font-medium text-slate-100">
              {{ profile.vision }}
            </p>
          </span>

          <span>
            <h1 class="mt-4 text-xl font-semibold text-slate-50">Values :</h1>
            <p class="font-medium flex  gap-2 text-slate-50" v-for="value in profile.values"
              :key="value.id">
              <span class="text-green-500 my-auto">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

              </span>
              {{ value }}
            </p>
          </span>
          <span v-if="profile.history">
            <h1 class="mt-4 text-xl font-semibold text-slate-700">History</h1>
            <p class="w-full font-medium prose text-slate-500">
              {{ profile.history }}
            </p>
          </span>
        </div>
        <div class="mt-3  ">
          <Link v-if="counts.products > 0" :href="route('welcome.products.owner', username)">

          <span class="
          w-64
          
            inline-flex
            justify-center
            px-8
            py-2
            mb-2
            text-sm
            font-medium
            text-slate-50
            capitalize
            border
            rounded
            hover:cursor-pointer
            border-green-500
            hover:text-black
            hover:bg-white
            hover:shadow-md
            hover:shadow-green-500
          ">
            See Our Products
          </span>

          </Link>
        </div>
        <div>
          <Link v-if="counts.services > 0" :href="route('welcome.services.owner', username)">
          <span class="
          w-64
           inline-flex
           justify-center
           px-8
           py-2
           mb-2
           text-sm
           font-medium
           text-slate-50
           capitalize
           border
           rounded
           hover:cursor-pointer
           border-green-500
           hover:text-black
           hover:bg-white
           hover:shadow-md
           hover:shadow-green-500
         ">
            See Our Services
          </span>
          </Link>
        </div>
        <div>
          <Link v-if="counts.accommodations > 0"
             :href="route('welcome.accommodations.owner', username)">
            <span class="
            w-64
           inline-flex
           justify-center
           px-8
           py-2
           mb-2
           text-sm
           font-medium
           text-slate-50
           capitalize
           border
           rounded
           hover:cursor-pointer
           border-green-500
           hover:text-black
           hover:bg-white
           hover:shadow-md
           hover:shadow-green-500
         ">
            See Our Accommodations
          </span>
         
          </Link>
        </div>
        <div >
          <Link v-if="counts.cars > 0"
          
            :href="route('welcome.cars.owner', username)">
            <span class="
            w-64
           inline-flex
           justify-center
           px-8
           py-2
           mb-2
           text-sm
           font-medium
           text-slate-50
           capitalize
           border
           rounded
           hover:cursor-pointer
           border-green-500
           hover:text-black
           hover:bg-white
           hover:shadow-md
           hover:shadow-green-500
         ">
            See Our Garage
          </span>
          </Link>
        </div>
        <div >
          <Link v-if="counts.plots > 0"
           
            :href="route('welcome.plots.owner', username)">
            <span class="
            w-64
           inline-flex
           justify-center
           px-8
           py-2
           mb-2
           text-sm
           font-medium
           text-slate-50
           capitalize
           border
           rounded
           hover:cursor-pointer
           border-green-500
           hover:text-black
           hover:bg-white
           hover:shadow-md
           hover:shadow-green-500
         ">
            See Our Estates
          </span>
          </Link>
          <div class="flex justify-center">
            <document-list class="text-slate-50 " :documents="profile.documents"
            path="attachments.show" heading="Company Documents" />
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
  employees: Object
});
</script>