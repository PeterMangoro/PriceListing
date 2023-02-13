<template>
  <div class="flex flex-wrap justify-evenly">
    <div 
    v-for="image in images" :key="image.id"
    class="bg-gray-200 rounded-lg w-72">
      <img
        :src="image"
        :alt="image"
        class="object-cover object-center rounded w-72 h-72 group-hover:opacity-75"
      />
    </div>
  </div>
</template>
<script>

</script>

