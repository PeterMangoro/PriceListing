<template>
  <div
    class="
      object-center
      w-48
      px-2
      py-4
      mt-6
      overflow-hidden
      bg-white
      rounded-lg
      shadow-md
      hover:scale-105 hover:duration-500
      sm:max-w-md
    "
  >
    <h1>{{ heading }}</h1>
    <div class="flex flex-wrap mt-1 justify-evenly w-44">
      <span v-for="image in images" :key="image" class="p-1">
        <img
          class="object-cover object-center w-20 rounded group-hover:opacity-75"
          :src="image.attachment"
        />
      </span>
    </div>
    <p>See more</p>
  </div>
</template>

<script setup>
const props = defineProps({
  heading: String,
  images: Object,
});
</script>

<style>
</style>