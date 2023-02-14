<template>
    <div class="w-1/2 ">
        <label for="search" class="hidden">Search</label>
        <jet-input
            id="search"
            ref="search"
            v-model="search"
            :class="{ 'transition-border': search }"
            autocomplete="off"
            name="search"
            :placeholder= placeholder
            type="search"
            @keyup.esc="search = null"
            @blur="search = null"
        />
    </div>
</template>
 
<script>
    import { defineComponent } from "vue";
    import JetInput from "@/Components/TextInput.vue";
    import axios from 'axios';
 
    export default defineComponent({
        props: {
            // any route name from laravel routes (ideally index route is what you'd search through)
            routeName: String,
            placeholder: String,
        },
 
 components:{
JetInput
 },
        data() {
            return {
                // page.props.search will come from the backend after search has returned.
                search: this.$inertia.page.props.search || null,
            };
        },
 
        watch: {
            search() {
                if (this.search) {
                    // if you type something in the search input
                    this.searchMethod();
                } else {
                    // else just give us the plain ol' paginated list - route('stories.index')
                    this.$inertia.get(route(this.routeName));
                }
            },
        },
 
        methods: {
            searchMethod: _.debounce(function () {
                this.$inertia.get(
                    route(this.routeName),
                    { search: this.search },
                    { preserveState: true }
                );
            }, 500),
        },
    });
</script>