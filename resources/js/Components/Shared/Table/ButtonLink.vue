<template>
  <Link
    :href="link"
    class="inline-flex items-center px-4 py-2 text-sm font-semibold tracking-widest text-white transition bg-green-600 border border-transparent rounded-md hover:bg-green-800 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25"
  >
    <slot />
  </Link>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import { defineProps } from "vue";
defineProps({
  link: {
    type: String,
    required: true,
  },
});
</script>
