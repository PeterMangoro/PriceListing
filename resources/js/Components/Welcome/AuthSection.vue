<template>
  <div class="flex pt-5 justify-evenly">
    <div>
      <Link
        :href="route('register')"
        class="px-6 py-4 font-semibold text-white transition duration-200 ease-in-out bg-indigo-600 border border-indigo-700 rounded-xl focus:ring focus:ring-indigo-300 hover:bg-indigo-700"
        type="button"
      >
        Register for Free
      </Link>
    </div>

    <div>
      <Link
        :href="route('login')"
        class="px-6 py-4 font-semibold text-white transition duration-200 ease-in-out bg-green-600 border border-green-700 rounded-xl focus:ring focus:ring-indigo-300 hover:bg-green-700"
        type="button"
      >
        Login
      </Link>
      
    </div>
  </div>
</template>
<script setup>


</script>

