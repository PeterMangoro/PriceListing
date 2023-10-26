<template>
  <div>
    <Link
            :href="path"
            class="scale-100 p-6 justify-between bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
          >
            <div>
              
              <div
                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  class="w-7 h-7 stroke-red-500"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    :d="icon"
                  />
                </svg>
              </div>

              <h2
                class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"
              >
               {{title}}
              </h2>
            </div>

            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
              />
            </svg>
          </Link>
  </div>
</template>

<script setup>
const props = defineProps({
    icon:String,
    title:String,
    path:String
})
</script>

<style>

</style>