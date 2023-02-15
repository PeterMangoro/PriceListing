<script setup>
defineProps({
  on: Boolean,
});
</script>

<template>
  <div>
    <transition
      leave-active-class="transition duration-1000 ease-in"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <div v-show="on" class="flex gap-1 m-auto text-sm text-gray-600">
          <slot />
        <div class="text-green-500">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-4 h-4"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
        </div>
      
      </div>
    </transition>
  </div>
</template>
