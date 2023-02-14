<template>
  <div v-if="images.length">
    <div class="flex flex-col items-center">
      <transition-group
        class="flex items-center overflow-hidden w-72"
        tag="div"
      >
        <div>
          <div class="bg-gray-200 rounded-lg w-72">
            <img
              :src="image"
              :alt="image"
              class="object-cover object-center rounded  w-72 h-72 group-hover:opacity-75"
            />
          </div>
        </div>
      </transition-group>
      <div class="w-72">
        <div class="flex">
          <div
            class="flex justify-start gap-2 m-auto mt-2 overflow-x-auto rounded-lg "
          >
            <img
              v-for="(image, index) in images"
              :key="index.id"
              :src="image.path"
              :alt="image.path"
              class="object-cover object-center w-20 h-20 rounded  group-hover:opacity-75 hover:cursor-pointer"
              @click="selectedImage(image.path)"
            />

            <!-- <button class='p-1 rounded ' @click="previous">prev</button>
      <button class='p-1 rounded' @click="next">next</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
// <script>
// export default {
//   props: {
//     images: Object,
//   },

//   data(props) {
//     return {
//       slides: props.images,

//     };
//   },
//   methods: {
//     // pagination
//    next () {
//       const first = this.slides.shift()
//       this.slides = this.slides.concat(first)
//     },
//     previous () {
//       const last = this.slides.pop()
//       this.slides = [last].concat(this.slides)
//     }
//     // pagination End
//   },

// };
//
</script>

<script setup>
import { ref } from "vue";
const props = defineProps({
  images: Object,
});

const image = ref(props.images[0].path);

function selectedImage(path) {
  image.value = path;
}
</script>

