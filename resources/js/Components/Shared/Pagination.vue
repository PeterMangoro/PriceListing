<template>
  <div class="flex ">
    <template v-for="(link, key) in links" :key="key">
      <div
        v-if="link.url === null"
        v-html="link.label"
        class="px-4 py-3 mb-1 mr-1 text-sm leading-4 text-slate-100 border rounded "
      ></div>
      <Link
      
    
        :key="key"
        v-else
        :href="link.url"
        v-html="link.label"
        class="px-4 py-3 mb-1 mr-1 text-sm leading-4 border rounded focus:text-indigo-500 focus:border-indigo-500 hover:bg-white"
        :class="{ 'bg-indigo-200 ': link.active }"
        preserve-scroll
      />
    </template>
  </div>
</template>

<script setup>

defineProps({
  links: Array,
});
</script>

<style>
</style>