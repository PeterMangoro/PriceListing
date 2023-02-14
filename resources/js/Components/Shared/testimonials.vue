<template>
  <section>
    <header
      class="
        p-4
        space-y-4
        bg-white
        sm:px-8 sm:py-6
        lg:p-4
        xl:px-8 xl:py-6
        bg-gradient-to-r
        from-sky-100
        via-green-100
        to-slate-100
      "
    >
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-slate-900">Testimonials</h2>
      </div>
    </header>
    <ul
      class="
        grid grid-cols-1
        gap-4
        p-4
        text-lg
        leading-6
        bg-gradient-to-r
        from-sky-100
        via-green-100
        to-slate-100
        bg-slate-50
        sm:px-8 sm:pt-6 sm:pb-8
        lg:p-4
        xl:px-8 xl:pt-6 xl:pb-8
        sm:grid-cols-2
        lg:grid-cols-1
        xl:grid-cols-2
      "
    >
      <li v-for="ratings in paginated" :key="ratings.id" class="flex">
        <Link
          class="
            flex flex-col
            items-center
            justify-center
            w-full
            py-3
            text-base
            font-semibold
            leading-6
            border-2 border-dashed
            rounded-md
            hover:border-blue-500
            hover:border-solid
            hover:bg-white
            hover:text-blue-500
            group
            border-slate-300
            text-slate-900
          "
        >
          <!-- <img
            :src="ratings.user.profile_photo_url"
            :alt="ratings.user.name"
            class="w-20 h-20 text-lg rounded-full bg-slate-100 ring-2 ring-white"
            loading="lazy"
          /> -->

          {{ ratings.commenter }}

          <dd class="px-3 text-sm group-hover:text-black text-slate-900">
            {{ ratings.comment }}
          </dd>
        </Link>
      </li>
      <!-- PAGINATION START -->
      <div class="pt-2 mt-4 col-12">
        <ul class="mb-0 pagination justify-content-center">
          <li v-if="current == 1" class="hidden page-item">
            <Link class="page-link" @click="prev" aria-label="Previous"
              >Load Less</Link
            >
          </li>
          <li v-else class="page-item">
            <Link class="page-link" @click="prev" aria-label="Previous"
              >Load Less</Link
            >
          </li>

          <li class="page-item">
            <Link class="page-link" @click="next()" aria-label="Next"
              >Load More</Link
            >
          </li>
        </ul>
      </div>
      <!-- pagination end -->
    </ul>
  </section>
</template>

<script>
export default {
  props: {
    ratings: Object,
  },

  data(props) {
    return {
      ratings: props.ratings,

      search: "",

      //   pagination
      current: 1,
      display: 2,
      // pagination end
    };
  },
  methods: {
    // pagination
    prev() {
      this.current--;
    },

    next() {
      this.current++;
    },

    // pagination End
  },

  computed: {
    // Pagination
    indexStart() {
      return (this.current - 1) * this.display;
    },

    indexEnd() {
      return this.indexStart + this.display;
    },

    paginated() {
      return this.ratings.slice(this.indexstart, this.indexEnd);
    },

    //    pagination end

    Images() {
      return this.ratings;
    },
  },
};
</script>