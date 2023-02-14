<template>
  <div>
    <h1 class="pt-2 font-semibold  underline">
     <span v-if="heading"> {{ heading}} </span>
     <span v-else> Product Documents</span>
     
      </h1>
    <span
      v-for="document in documents"
      :key="document.id"
      class="flex flex-wrap justify-between gap-2 hover:cursor-pointer hover:scale-105 hover:text-sky-400 hover:duration-300"
    >
      <a :href="route(path, document.uuid)" target="_blank"
        >📃{{ document.name }}</a
      >
    </span>
  </div>
</template>
<script setup>
const props = defineProps({
  documents: Object,
  path: String,
  heading:String,
});
</script>

<style>
</style>