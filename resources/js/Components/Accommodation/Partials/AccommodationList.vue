<template>
  <div class="flex flex-wrap justify-around space-x-0.51">
    <Link
      v-for="(item, index) in items"
      :key="index"
      :href="route(show_route, item.uuid)"
      class="p-2"
    >
      <figure
        class="
          rounded
          shadow-2xl
          bg-slate-100
          w-80
          hover:scale-110 hover:duration-500
          md:flex
         
        "
        :class="{
          [`shadow-red-600 hover:shadow-lg hover:shadow-red-600  shadow-lg`]:
            item.discount,
        }"
      >
        <div class="flex items-center">
          <img
            class="object-cover w-32 h-32 rounded-l md:overflow-visible"
            :src="item.latest_image"
            :alt="item.uuid"
          />

          <div
            class="
              p-2
              text-center
              bg-transparent
              rounded-none
              md:text-left
             
            "
          >
            <h3
              class="
                text-sm
                font-medium
                break-words
                text-slate-700
                w-22
                sm:w-44
                line-clamp-3
              "
            >
              {{ item.city }},
            </h3>
            <h3
              class="
                text-sm
                break-words
                text-slate-700
                w-22
                sm:w-44
                line-clamp-3
              "
            >
              {{ item.town }}
            </h3>

            <figcaption class="font-medium">
              <h3 class="text-sm text-slate-700">{{ item.a_rooms }} rooms,</h3>

              <p
                v-if="item.discount"
                class="px-2 mt-2 font-semibold text-black break-words w-28"
              >
                {{ item.discount.price }} ⏰
              </p>
              <p
                v-else
                class="px-2 mt-2 font-semibold text-black break-words w-28"
              >
                {{ item.price }}
              </p>
            </figcaption>
          </div>
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

