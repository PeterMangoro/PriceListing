<template>
  <div class="flex flex-wrap justify-evenly gap-2">
    <div 
    v-for="image in images" :key="image.id"
    class="bg-gray-200 rounded-lg w-72 sm:w-60">
      <img
        :src="image.path"
        :alt="image.path"
        class="object-cover object-center rounded w-72 h-72 group-hover:opacity-75"
      />
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  images: Object,
});
</script>

