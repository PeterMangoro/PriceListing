<template>
  <section class="pb-5 bg-blue-100 shadow rounded-b-md">
    <div class="flex justify-center p-2">
      <div class="p-2 mx-auto">
        <h1 class="text-3xl font-bold tracking-widest text-black capitalize">
          All the help you need at one place!!!
        </h1>
        <p class="pb-3 italic tracking-wide">
          A perfect market place for everyone...
        </p>
        <div class="flex flex-wrap gap-2">
          <p>Are you an entrepreneur or you have something to sell ?</p>
          <Link
            :href="route('dashboard.dashboard')"
            class="font-medium text-red-600 transition duration-200 ease-in-out  hover:scale-105"
          >
            Advertise for free!!
          </Link>
        </div>
        <p>
          If you are looking to buy something then you have come to the right
          place
        </p>
        <p>browse through our many features</p>
        <div>
          <auth-section />
        </div>
      </div>
    </div>
  </section>
</template>
<script setup>
import AuthSection from "@/Components/Welcome/AuthSection.vue";
</script>
