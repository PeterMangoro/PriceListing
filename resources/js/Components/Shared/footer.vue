<template>
  <footer class="p-4 bg-indigo-900 sm:p-6">
    <div class="md:flex md:justify-between">
      <div class="mb-6 md:mb-0"></div>
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
        <div>
          <h2
            class="
              mb-6
              text-sm
              font-semibold
              text-slate-100
              uppercase
             
            "
          >
            Guide
          </h2>
          <ul class="text-gray-100 ">
            <li class="mb-4">
              <Link :href="route('pricing')" class="hover:underline"
                >Pricing</Link
              >
            </li>
            <li class="mb-4">
              <Link :href="route('guide')" class="hover:underline"
                >Buying & Selling
              </Link>
            </li>
            <li>
              <Link href="#" class="hover:underline">Uploading a Trip</Link>
            </li>
          </ul>
        </div>
        <div>
          <h2
            class="
              mb-6
              text-sm
              font-semibold
              text-slate-100
              uppercase
             
            "
          >
            Contact
          </h2>
          <ul class=" text-slate-100 ">
            <li class="mb-4">
              <Link
                href="https://github.com/themesberg/flowbite"
                class="hover:underline"
                >Github</Link
              >
            </li>
            <li>
              <Link href="https://discord.gg/4eeurUVvTy" class="hover:underline"
                >Discord</Link
              >
            </li>
          </ul>
        </div>
        <div>
          <h2
            class="
              mb-6
              text-sm
              font-semibold
              text-slate-100
              uppercase
             
            "
          >
            Legal
          </h2>
          <ul class=" text-slate-100 ">
            <li class="mb-4">
              <Link href="route('policy.show')" class="hover:underline"
                >Privacy Policy</Link
              >
            </li>
            <li>
              <Link href="route('terms.show')" class="hover:underline"
                >Terms &amp; Conditions</Link
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
      <span class="text-sm  text-slate-100 sm:text-center "
        >© 2022
        <Link :href="route('home')" class="hover:underline">MallVillage</Link>.
        All Rights Reserved.
      </span>
      <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
        <Link
          :href="route('about')"
          class=" text-slate-100 hover:text-black dark:hover:text-white"
        >
          About
        </Link>
      </div>
    </div>
  </footer>
</template>
<script>

</script>
