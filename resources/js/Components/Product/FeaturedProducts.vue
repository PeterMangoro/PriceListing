<template>
  <!-- Products Area -->
  <div class="py-2 w-60">
    <div
      class="
        px-1
        py-1
        mx-auto
        overflow-hidden
        border
        shadow-xl
        bg-slate-100
        sm:py-1
        lg:max-w-7xl
        max-w-7xl
        sm:rounded-lg
      "
    >
      <div class="">
        <h2 class="py-2 text-xl font-extrabold tracking-tight text-slate-50">
          {{ heading }}
        </h2>
      </div>
      <div class="grid w-56 grid-cols-2 grid-rows-2 gap-1">
        <Link
          v-for="(item, index) in items"
          :key="index"
          :href="route(routes, item.uuid)"
          class=""
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
              v-if="item.latest_image.path"
              :src="item.latest_image.path"
              :alt="item.title"
              class="
                object-cover
                rounded
                w-28
                h-28
                hover:scale-110 hover:duration-500
              "
            />
            <img
              v-else
              :src="item.latest_image"
              :alt="item.title"
              class="
                object-cover
                rounded
                w-28
                h-28
                hover:scale-110 hover:duration-500
              "
            />
          </div>
        </Link>
      </div>
      <!-- PAGINATION START -->
      <div class="flex flex-wrap float-right pb-1">
        <Link
          v-if="show_more"
          class="
            inline-flex
            justify-center
            px-8
            py-2
            text-sm
            font-medium
            text-slate-50
            border border-transparent
            rounded
            hover:border-green-500
          "
          :href="route(show_more)"
          >Show More
        </Link>
      </div>
      <!--end col-->
      <!-- PAGINATION END -->
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from "vue";

const props = defineProps({
  items: Object,
  routes: Object,
  heading: String,
  show_more: String,
});
</script>

<style></style>
