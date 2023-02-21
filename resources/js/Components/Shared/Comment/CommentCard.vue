<template>
  <div class="w-full p-3 md:w-1/2 lg:w-1/3">
    <div class="h-full p-2 bg-slate-800 border shadow bg-opacity-60 rounded-xl">
      <div class="flex flex-col justify-between h-full">
        <div class="block mb-2">
          <div class="flex flex-wrap mb-2 -m-2">
            <div class="w-auto p-2">
              <h3 class="font-semibold leading-normal">{{ comment.user }}</h3>
              <div>
                <span class="flex space-x-1" v-if="comment.rating < 5">
                  <face-frown-icon class="w-4 h-4 text-red-700" />
                  <p class="text-sm ">{{ comment.rating }}</p>
                </span>
                <span class="flex space-x-1" v-else>
                  <face-smile-icon class="w-4 h-4 text-green-400" />
                  <p class="text-sm ">{{ comment.rating }}</p>
                </span>
              </div>
            </div>
          </div>
          <p class="text-lg font-medium ">'' {{ comment.comment }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { HandThumbDownIcon, HandThumbUpIcon,FaceSmileIcon,FaceFrownIcon } from "@heroicons/vue/24/solid";
const props = defineProps({
  comment: Object,
});
</script>