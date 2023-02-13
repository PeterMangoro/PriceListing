<template>
   <p class="py-2 border-t-2 border-b-2">{{ details }}</p>
</template>

<script setup>
const props = defineProps({
    details:String,
})
</script>

<style>

</style>