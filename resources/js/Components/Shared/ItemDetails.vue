<template>
   <p v-for="(point, index) in details" :key="index" class="flex gap-1">
          <span class="my-auto text-green-500"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg></span>
          <span v-if="index" class="text-slate-100"> {{ point }} </span>
        </p>
</template>

<script setup>
const props = defineProps({
    details:Object,
})
</script>

<style>

</style>