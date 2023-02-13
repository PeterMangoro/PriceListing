<template>
  <select
   v-model="per_page"
   @change="per_page === $event.target.value"
    class="text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
  >
    <option value="5">5 Per Page</option>
    <option value="10">10 Per Page</option>
    <option value="15">15 Per Page</option>
  </select>
</template>

<script>
 import { defineComponent } from "vue";
export default defineComponent({
  props: {
    // any route name from laravel routes (ideally index route is what you'd per_page through)
    routeName: String,
    },

  
  data() {
    return {
      // page.props.per_page will come from the backend after per_page has returned.
      per_page: this.$inertia.page.props.per_page || null,
      search: this.$inertia.page.props.search ,
    };
  },

  watch: {
    per_page() {
      if (this.per_page) {
        // if you type something in the per_page input
        this.per_pageMethod();
      } else {
        // else just give us the plain ol' paginated list - route('stories.index')
        this.$inertia.get(route(this.routeName));
      }
    },
  },

  methods: {
    per_pageMethod: _.debounce(function () {
      this.$inertia.get(
        route(this.routeName),
        { search: this.search, per_page: this.per_page },
        { preserveState: true, replace: true }
      );
    }, 200),
  },
});
</script>