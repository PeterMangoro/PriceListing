<template>
  <div class="inline-block duration-300 hover:relative group">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
</svg>

    <span
      class="
        absolute
        hidden
        group-hover:flex
        -left-5
        capitalize
        -top-2
        -translate-y-full
        w-48
        px-2
        py-1
        bg-gray-700
        rounded-lg
        text-center text-white
        font-semibold
        text-sm
        after:content-['']
        after:absolute
        after:left-1/8
        after:top-[100%]
        after:-translate-x-1/4
        after:border-8
        after:border-x-transparent
        after:border-b-transparent
        after:border-t-gray-700
      "
      >{{ tip }}</span
    >
  </div>
</template>

<script setup>


const props = defineProps({
  tip: String,
});
</script>

