<template>
  <div v-if="item.discount" class="flex flex-wrap justify-between">
    <p class="font-semibold text-slate-100">{{ item.discount.price }}</p>
    <p class="text-slate-100">{{ item.discount.percent }}</p>
    <p class="text-slate-100">( {{ item.discount.date }} )</p>
  </div>

  <p
    class="font-semibold text-slate-50"
    :class="{ [`line-through`]: item.discount }"
  >
    {{ item.price }}
  </p>
</template>
<script setup>
const props = defineProps({
  item: Object,
});
</script>