<template>
  <footer class="p-4 bg-blue-charcoal-900 sm:p-6">
    <div class="md:flex md:justify-between">
      <div class="mb-6 md:mb-0"></div>
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-4">
        <footer-column title="Navigation" :paths="NavigationPaths" />
        <footer-column title="Uploading" :paths="UploadingPaths" />
        <footer-column title="Management" :paths="ManagingPaths" />
        <footer-column title="Profile" :paths="ProfilePaths" />
      </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
      <span class="text-sm text-slate-100 sm:text-center"
        >© 2022
        <Link :href="route('home')" class="hover:underline text-sky-500">Price-Listing</Link>.
        All Rights Reserved.
      </span>
      <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
        <Link
          :href="route('about')"
          class="text-slate-100 hover:text-black dark:hover:text-white"
        >
          About
        </Link>
      </div>
    </div>
  </footer>
</template>
<script setup>
import FooterColumn from "@/Components/Footer/Partials/FooterColumn.vue";

const UploadingPaths = [
  {
    id: 1,
    path: "accommodations.create",
    heading: "Upload an Accommodation",
  },
  {
    id: 2,
    path: "cars.create",
    heading: "Upload a Vehicle",
  },
  {
    id: 3,
    path: "plots.create",
    heading: "Upload an Estate",
  },
  {
    id: 4,
    path: "products.create",
    heading: "Upload a Product",
  },
  {
    id: 5,
    path: "services.create",
    heading: "Upload a Service",
  },
];

const ManagingPaths = [
  {
    id: 1,
    path: "accommodations.index",
    heading: "Manage your  Accommodations",
  },
  {
    id: 2,
    path: "cars.index",
    heading: "Manage your Garage",
  },
  {
    id: 3,
    path: "plots.index",
    heading: "Manage your  Estates",
  },
  {
    id: 4,
    path: "products.index",
    heading: "Manage your Shop",
  },
  {
    id: 5,
    path: "services.index",
    heading: "Manage your Services",
  },
];

const ProfilePaths = [
  {
    id: 1,
    path: "register",
    heading: "Register",
  },
  {
    id: 2,
    path: "login",
    heading: "Login",
  },
  {
    id: 3,
    path: "profile.show",
    heading: "Company Profile",
  },
  {
    id: 4,
    path: "employees.index",
    heading: "Manage your Team",
  },
  {
    id: 5,
    path: "socials.index",
    heading: "Manage your Social Accounts",
  },
];

const NavigationPaths = [
  {
    id: 1,
    path: "welcome.accommodations.index",
    heading: "Accommodations",
  },
  {
    id: 2,
    path: "welcome.cars.index",
    heading: "Car-Sale",
  },
  {
    id: 3,
    path: "welcome.plots.index",
    heading: "Estates",
  },

  {
    id: 4,
    path: "welcome.products.index",
    heading: "Shop",
  },

  {
    id: 5,
    path: "welcome.services.index",
    heading: "Services",
  },
];
</script>
