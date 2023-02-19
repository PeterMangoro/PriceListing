<template>
  <div class="bg-slate-50 bg-opacity-60 rounded-lg shadow-md shadow-indigo-600">
    <div class="rounded-lg overflow-display">
      <div class="col-span-6 pt-4 sm:col-span-2">
        <div class="mx-auto max-w-7xl sm:px-2 lg:px-2">
          <div class="flex flex-col">
            <div class="sm:-mx-6 lg:-mx-8">
              <div
                class="inline-block min-w-full py-2 sm:px-6 lg:px-8 overflow-display"
              >
                <div class="overflow-display">
                  <div class="overflow-display">
                    <h1 class="px-10 font-bold underline text-slate-900">
                      {{ heading }}

                      <span v-if="path"
                        ><Link
                          :href="route(path)"
                          class="
                            float-right
                            px-6
                            py-2.5
                            bg-green-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-green-700 hover:shadow-lg
                            focus:bg-green-700
                            focus:shadow-lg
                            focus:outline-none
                            focus:ring-0
                            active:bg-green-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out
                          "
                          >{{ button }}</Link
                        ></span
                      >
                    </h1>
                  </div>
                  <table class="w-full">
                    <thead>
                      <tr
                        class="font-semibold tracking-wide text-left text-gray-900  border-b border-black"
                      >
                        <slot name="tableHead"></slot>
                      </tr>
                    </thead>
                    <tbody class="">
                      <slot />
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
      <div v-if="pagination" class="p-2 flex justify-center  ">
      <Pagination :links="pagination"  class="text-center" />
    </div>
  
    
  </div>
</template>

<script setup>
import Pagination from "@/Components/Shared/Pagination.vue";
const props = defineProps({
  heading: Object,
  path: Object,
  button: Object,
  pagination: Object,
});
</script>