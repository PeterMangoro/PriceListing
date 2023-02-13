<template>
  <div v-if="rating" class="flex space-x-1">
      <heart-icon class="w-4 h-4 text-red-600" />
      <p class="text-sm text-black">{{ rating }}</p>
    </div>
</template>

<script setup>
import { HeartIcon } from "@heroicons/vue/24/solid";
const props = defineProps({
    rating:Object,
})
</script>

<style>

</style>