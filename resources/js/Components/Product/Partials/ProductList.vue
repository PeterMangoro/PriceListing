<template>
  <div class="flex flex-wrap justify-around space-x-0.51">
    <Link
      v-for="(item, index) in items"
      :key="index"
      :href="route('welcome.products.show', item.uuid)"
      class="p-2 "
    >
      <div
        class="
          overflow-hidden
          px-4
          mx-2
          rounded
          shadow-sm
          w-72
          hover:shadow-2xl hover:-translate-y-1 hover:scale-105 hover:duration-500
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
          class="object-cover w-72 h-72  rounded-lg"
        />

        <h3 class="px-2 mt-2 text-sm text-slate-50 break-words truncate w-72">
          {{ item.title }}
        </h3>

        <p
          v-if="item.discount"
          class="px-2 mt-2 text-sm font-semibold text-slate-50 break-words w-72"
        >
          {{ item.discount.price }} ⏰
        </p>
        <p
          v-else
          class="px-2 mt-2 text-sm font-semibold text-slate-50 break-words w-72"
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
