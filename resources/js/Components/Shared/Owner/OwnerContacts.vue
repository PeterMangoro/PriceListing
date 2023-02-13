<template>
  <div class="flex flex-wrap">
    <div
      v-for="social in socials"
      :key="social.id"
      class="inline-flex w-full mb-2 md:w-auto md:mr-2"
    >
      <div
        class="flex items-center h-12 pl-2 pr-6 bg-green-100 border-2 border-green-500 rounded-full "
      >
        <div class="flex items-center justify-center mr-2 text-black">
          {{ social.account }}:
        </div>
        <span class="font-medium text-black font-heading">{{
          social.handle
        }}</span>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  socials: Object,
});
</script>

<style>
</style>