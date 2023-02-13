<template>
  <div v-if="slides.length">
    <div class="flex flex-col items-center">
      <transition-group
      class="flex items-center overflow-hidden w-72"
      tag="div"
         >
      <div v-for="(image, index) in slides" :key="index.id">
        <div class="bg-gray-200 rounded-lg w-72">
          <img
            :src="image.path"
            :alt="image.path"
            class="object-cover object-center rounded w-72 group-hover:opacity-75"
          />
        </div>
      </div>
      </transition-group>
      <div class=''>
      <button class='p-1 rounded ' @click="previous">prev</button>
      <button class='p-1 rounded' @click="next">next</button>
    </div>
    </div>
  </div>

 
</template>

<script>
export default {
  props: {
    images: Object,
  },

  data(props) {
    return {
      slides: props.images,

      // search: "",

      // //   pagination
      // current: 1,
      // display: 2,
      // pagination end
    };
  },
  methods: {
    // pagination
   next () {
      const first = this.slides.shift()
      this.slides = this.slides.concat(first)
    },
    previous () {
      const last = this.slides.pop()
      this.slides = [last].concat(this.slides)
    }
    // pagination End
  },

  computed: {
    
    // Pagination
    // indexStart() {
    //   return (this.current - 1) * this.display;
    // },

    // indexEnd() {
    //   return this.indexStart + this.display;
    // },

    // paginated() {
    //   return this.images.slice(this.indexstart, this.indexEnd);
    // },

    // //    pagination end

    // Images() {
    //   return this.images;
    // },
  },
};
</script>

<style>
</style>