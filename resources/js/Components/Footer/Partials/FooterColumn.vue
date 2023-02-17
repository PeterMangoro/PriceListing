<template>
  <div>
    <h2 class="mb-6 text-sm font-semibold text-slate-100 uppercase underline ">
      {{ title }}
    </h2>
    <ul class="text-gray-100">
      <li class="mb-2" v-for="item in paths" :key="item.id">
        <Link :href="route(item.path)" class="hover:underline"
          >
          {{ item.heading }}
        </Link>
      </li>
    </ul>
  </div>
</template>
<script setup>
const props = defineProps({
  title: String,
  paths: Object,
});
</script>

