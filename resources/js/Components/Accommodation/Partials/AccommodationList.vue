<template>
  <div class="flex flex-wrap justify-around space-x-0.51">
    <Link
      v-for="(item, index) in items"
      :key="index"
      :href="route(show_route, item.uuid)"
      class="p-2"
    >
      <figure
        class="rounded-lg bg-slate-600 shadow-2xl w-72 bg-opacity-60 flex hover:scale-105 hover:duration-500"
        :class="{
          [`shadow-red-600 hover:shadow-lg hover:shadow-red-600 rounded-lg  shadow-lg`]:
            item.discount,
        }"
      >
        <div class="flex-none w-40 h-40">
          <img
            class="inset-0 w-full h-full object-cover rounded-l-lg"
            :src="item.latest_image"
            :alt="item.uuid"
          />
        </div>
        <div class="p-2 text-left  rounded-r w-full m-auto ">
          <h3
            class="text-sm font-medium break-words text-slate-50 line-clamp-3"
          >
            {{ item.city }},
          </h3>
          <h3
            class="text-sm break-words text-slate-50 line-clamp-3"
          >
            {{ item.town }}
          </h3>

          <figcaption class="font-medium">
            <h3 class="text-sm text-slate-50">{{ item.a_rooms }} rooms,</h3>

            <p
              v-if="item.discount"
              class=" mt-2 font-semibold text-slate-50 break-words "
            >
              {{ item.discount.price }} ⏰
            </p>
            <p
              v-else
              class="pmt-2 font-semibold text-slate-50 break-words "
            >
              {{ item.price }}
            </p>
          </figcaption>
        </div>
      </figure>
    </Link>
  </div>
</template>
<script setup>
import { inject } from "vue";

const show_route = inject("show_route");

const props = defineProps({
  items: Object,
});
</script>

