<script setup>
import { computed, ref, watch } from "vue";
import { usePage } from "@inertiajs/vue3";

const show = ref(true);
const style = computed(
  () => usePage().props.jetstream.flash?.bannerStyle || "success"
);
// const message = ref(usePage().props.jetstream.flash.banner) || "";
const message = computed(() => usePage().props.jetstream.flash?.banner || '');

function clear() {
  show.value = false
}

watch(message, async () => {
  show.value = true;
});
</script>

<template>
  <div>
    <div
      v-if="show && message"
      :class="{
        'bg-indigo-500': style == 'success',
        'bg-red-700': style == 'danger',
      }"
    >
      <div class="fixed top-0 left-0 w-full pt-8 pb-10 z-50">
        <div class="flex px-6 justify-center">
          <div
            class="inline-flex gap-1 py-2 pl-5 pr-6 items-center bg-green-100 border border-green-500 rounded-3xl"
          >
            <span class="mr-4">
              <svg
                width="21"
                height="22"
                viewbox="0 0 21 22"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect
                  y="0.5"
                  width="21"
                  height="21"
                  rx="10.5"
                  fill="#219653"
                ></rect>
                <path
                  d="M15.7676 8.13463C15.4582 7.82482 14.9558 7.82501 14.646 8.13463L9.59787 13.183L7.35419 10.9393C7.04438 10.6295 6.54217 10.6295 6.23236 10.9393C5.92255 11.2491 5.92255 11.7513 6.23236 12.0611L9.03684 14.8656C9.19165 15.0204 9.39464 15.098 9.59765 15.098C9.80067 15.098 10.0039 15.0206 10.1587 14.8656L15.7676 9.25644C16.0775 8.94684 16.0775 8.44443 15.7676 8.13463Z"
                  fill="white"
                ></path>
              </svg>
            </span>
            <p class="text-green-800">{{ message }}</p>

            <div class="shrink-0 sm:ml-3">
              <button
                type="button"
                class="-mr-1 flex rounded-full focus:outline-none sm:-mr-2 transition"
                :class="{
                  ' hover:scale-110 focus:bg-green-600': style == 'success',
                  'hover:bg-red-600 focus:bg-red-600': style == 'danger',
                }"
                aria-label="Dismiss"
                @click.prevent="clear()"
              >
                <svg
                  class="h-5 w-5 text-red-500 hover:text-red-600"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
