<template>
  <!-- Products Area -->
  <div class="py-2">
    <div
      class="
        px-4
        py-1
        mx-auto
        overflow-hidden
        border
        shadow-xl
        bg-slate-100
        sm:py-1 sm:px-6
        lg:max-w-7xl lg:px-8
        max-w-7xl
        sm:rounded-lg
      "
    >
      <div class="flex">
        <h2
          class="
            p-4
            text-2xl
            font-extrabold
            tracking-tight
            text-black
            capitalize
          "
        >
          {{ heading }}
        </h2>

        <div class="p-2">
          <Link
            class="
              inline-flex
              justify-center
              px-8
              py-2
              text-sm
              font-medium
              text-black
              border border-transparent
              rounded
              hover:border-green-500
            "
            :href="route(show_more, type)"
            >Show More
          </Link>
        </div>
      </div>
      <div class="flex flex-wrap justify-around space-x-0.51">
        <Link
          v-for="(item, index) in items"
          :key="index"
          :href="route(routes, item.uuid)"
          class="p-2"
        >
          <div
            class="
              overflow-hidden
              border
              rounded
              shadow-sm
              hover:shadow-2xl hover:-translate-y-1
            "
            :class="{
              [`shadow-red-600 hover:shadow-lg hover:shadow-red-600  shadow-lg`]:
                item.discount,
            }"
          >
            <img
              v-if="item.latest_image"
              :src="item.latest_image"
              :alt="item.title"
              class="object-cover w-28 h-28 hover:scale-110 hover:duration-500"
            />

            <h3 class="px-2 mt-2 text-sm text-black break-words truncate w-28">
              {{ item.title }}
            </h3>
            <p
              v-if="item.discount"
              class="
                px-2
                mt-2
                text-sm
                font-semibold
                text-black
                break-words
                w-28
              "
            >
              {{ item.discount.price }} ⏰
            </p>
            <p
              v-else
              class="
                px-2
                mt-2
                text-sm
                font-semibold
                text-black
                break-words
                w-28
              "
            >
              {{ item.price }}
            </p>
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
