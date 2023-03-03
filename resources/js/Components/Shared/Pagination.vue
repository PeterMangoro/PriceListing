<template>
  <div class="flex">
    <template v-for="(link, key) in links" :key="key">
      <div
        v-if="link.url === null"
        v-html="link.label"
        class="px-4 py-3 mb-1 mr-1 text-sm leading-4 text-slate-100 bg-slate-800 opacity-90 border rounded"
      ></div>
      <Link
        :key="key"
        v-else
        :href="link.url"
        v-html="link.label"
        class="px-4 py-3 mb-1 mr-1 text-sm leading-4 border rounded text-slate-100 bg-slate-800 focus:text-indigo-500 focus:border-indigo-500 hover:bg-white hover:text-black"
        :class="{ 'border-red-500 ': link.active }"
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

<style></style>