<template>
  <!-- Plots Area -->
  <div class="py-2">
    <div
      class="
        px-4
        py-1
        mx-auto
        overflow-hidden
       
        shadow-xl
        sm:py-1 sm:px-6
        lg:max-w-7xl lg:px-8
        max-w-7xl
        sm:rounded-lg
      "
    >
      <div class="flex">
        <!-- <h2
          class="
            p-4
            text-2xl
            font-extrabold
            tracking-tight
            text-slate-50
            capitalize
          "
        >
          {{ heading }}
        </h2> -->

        <div class="p-2">
          <Link
            class="
              inline-flex
              justify-center
              px-8
              py-2
              text-sm
              font-medium
              text-slate-50
              border
              rounded
              shadow
              hover:border-green-500
            "
            :href="route(show_more, type)"
            >Show More
          </Link>
        </div>
      </div>
      <div class="flex flex-wrap justify-around gap-4 py-4">
        <Link
          v-for="(item, index) in items"
          :key="index"
          :href="route(routes, item.uuid)"
          class="
            p-2
            transition
            duration-300
            ease-in-out
            bg-white
            border
            shadow
            bg-opacity-60
            rounded-xl
            hover:scale-105 hover:bg-slate-100
          "
        >
          <div class="overflow-hidden">
            <h3
              class="
                w-40
                px-2
                mt-2
                text-sm
                font-semibold
                text-indigo-700
                break-words
                line-clamp-3
              "
            >
              {{ item.location.street }},
            </h3>
            <h3
              class="
                w-40
                px-2
                mt-2
                text-sm
                font-semibold
                text-indigo-700
                break-words
                line-clamp-3
              "
            >
              {{ item.location.city }}
            </h3>

            <h3 class="px-2 mt-2 text-sm text-slate-50 break-words truncate w-28">
              {{ item.price }}
            </h3>

            <h3 class="px-2 mt-2 text-sm text-slate-50 break-words truncate w-28">
              {{ item.size }}
            </h3>
          </div>
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  items: Object,
  routes: Object,
  heading: Object,
  show_more: String,
  type: String,
});
</script>

<style></style>
