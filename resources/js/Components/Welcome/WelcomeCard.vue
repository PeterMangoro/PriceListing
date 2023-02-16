<template>
  <Link
    :href="route(path)"
    class="p-3 transition duration-300 ease-in-out rounded  hover:scale-105 hover:cursor-pointer sm:w-96 bg-slate-50 hover"
  >
    <div class="flex gap-8">
      <img class="my-auto text-5xl  h-20 w-20 object-cover object-cent" :src= image />
      <span>
        <h1 class="text-xl font-bold tracking-wide text-green-500 capitalize">
          {{ heading }}
        </h1>
        <p class="line-clamp-3">
          {{ detail }}
        </p>
      </span>
    </div>
  </Link>
</template>
<script setup>
const props = defineProps({
  heading: String,
  detail: String,
  image: String,
  path: String,
});
</script>
