<template>
  <div class="flex flex-wrap justify-around space-x-0.51">
    <Link
      v-for="(item, index) in items"
      :key="index"
      :href="route('welcome.products.show', item.uuid)"
      class="p-2"
    >
      <div
        class="
          overflow-hidden
          border
          rounded
          shadow-sm
          w-28
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
          class="px-2 mt-2 text-sm font-semibold text-black break-words w-28"
        >
          {{ item.discount.price }} ⏰
        </p>
        <p
          v-else
          class="px-2 mt-2 text-sm font-semibold text-black break-words w-28"
        >
          {{ item.price }}
        </p>
      </div>
    </Link>
  </div>
</template>
<script setup>
const props = defineProps({
  items: Object,
});
</script>
