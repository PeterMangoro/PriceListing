<template>  
    <p class="flex gap-2 py-2">
      <span 
      :class="{ [`hidden`]: tag==false }"
      class="font-medium text-slate-800">Location: </span>
      {{ location.street }} <br />
      {{ location.town }} <br />
      {{ location.city }}
    </p>
</template>

<script setup>
const props = defineProps({
    location:Object,
    tag:{
      type:Boolean ,
      default:true
      }
})
</script>

<style>

</style>