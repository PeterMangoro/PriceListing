<template>
  <div class="p-2 mx-auto rounded shadow bg-slate-100 max-w-7xl">
    <h2
      v-if="heading"
      class="
        items-start
        px-4
        py-2
        text-2xl
        font-extrabold
        tracking-tight
        text-black
        capitalize
      "
    >
      {{ heading }}
    </h2>
    <span class="flex flex-wrap justify-between gap-2">
      <span v-for = "type in categories" :key="type.id" >
        <Link
          v-if="type.type"
          class="
            inline-flex
            justify-center
            px-8
            py-2
            text-sm
            font-medium
            text-black
            border border-transparent border-green-500
            rounded
            hover:bg-green-500 hover:text-white
          "
          :href="route(route_type, type.type)"
        >
          {{ type.title }}
        </Link>

        <Link
          v-else
          class="
            inline-flex
            justify-center
            px-8
            py-2
            text-sm
            font-medium
            text-black
            border border-transparent border-green-500
            rounded
            hover:bg-green-500 hover:text-white
          "
          :href="route(route_type, type.slug)"
        >
          {{ type.title }}
        </Link>
      </span>
    </span>
  </div>
</template>
<script setup>
const props = defineProps({
  categories: Object,
  route_type: String,
  heading: String,
});
</script>