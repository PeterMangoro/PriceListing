<template>
  <div class="flex space-x-2">
    <label for="search" class="hidden">Search</label>
    <jet-input
      id="search"
      ref="search"
      v-model="search"
      :class="{ 'transition-border': search }"
      autocomplete="off"
      name="search"
      :placeholder="placeholder"
      type="search"
      @keyup.esc="search = null"
    />

    <!-- 
                    I'm not importing per-page component coz search props will not sync  when a value changes as it requires a page reload to pass data through components
                    <per-page :routeName=routeName /> -->
    <select
      v-if="show_per_page"
      v-model="per_page"
      @change="per_page === $event.target.value"
      class="
        text-sm
        border-gray-300
        rounded-md
        shadow-sm
        focus:border-indigo-300
        focus:ring
        focus:ring-indigo-200
        focus:ring-opacity-50
      "
    >
      <option value="5">5 Per Page</option>
      <option value="10">10 Per Page</option>
      <option value="15">15 Per Page</option>
    </select>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import JetInput from "@/Components/TextInput.vue";
import PerPage from "@/Components/Shared/Table/PerPage.vue";

export default defineComponent({
  props: {
    // any route name from laravel routes (ideally index route is what you'd search through)
    routeName: String,
    routeParameter: Object,
    placeholder: String,
    show_per_page: Boolean,
  },

  components: {
    JetInput,
    PerPage,
  },
  data() {
    return {
      // page.props.search will come from the backend after search has returned.
      search: this.$inertia.page.props.data.filters.search || null,
      per_page: this.$inertia.page.props.data.filters.per_page || null,
    };
  },

  watch: {
    search() {
      // if you type something in the search input
      this.searchMethod();
    },
    per_page() {
      // if you type something in the search input
      this.per_pageMethod();
    },
  },

  methods: {
    searchMethod: _.debounce(function () {
      this.$inertia.get(
        route(this.routeName, this.routeParameter),
        { search: this.search, per_page: this.per_page },
        { preserveState: true, replace: true, preserveScroll: true }
      );
    }, 500),
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
