<template>
  <app-layout>

    <div class="">
      <landing-page :images="images2" class="mb-3" />
      <div class="flex flex-wrap w-auto gap-3 justify-evenly m-2  ">
        <welcome-card image="/storage/landing/clothes.jpg" heading="Marketplace"
          detail="Shop from different suppliers at the cheapest price for the highest quality"
          path="welcome.products.index" />

        <welcome-card image="/storage/landing/cars.webp" heading="Car Sale"
          detail="Find the best car deals and drive the car of your dreams" path="welcome.cars.index" />

        <!-- <welcome-card image="/storage/landing/house.jpeg" heading="Accommodation"
          detail="Find the place you will call home " path="welcome.accommodations.index" /> -->

        <!-- <welcome-card image="/storage/landing/farm.webp" heading="Real Estate"
          detail="Purchase land for your projects at good strategic locations " path="welcome.plots.index" /> -->

        <welcome-card image="/storage/landing/construction.jpg" heading="Services"
          detail="Check out Services provided ranging from fashion design, media, entertainment, car servicing and ..."
          path="welcome.services.index" />

        <!-- <welcome-card
        image="    🛣"
        heading="Travel & Transport"
        detail="Purchase land for your projects at good strategic locations "
        path="welcome.transports.index"
      /> -->
      </div>
    </div>

  </app-layout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import WelcomeCard from "@/Components/Welcome/WelcomeCard.vue";
import LandingPage from "@/Components/Shared/Gallery/LandingPage.vue";
// import CallToAction from "@/Components/Welcome/CallToAction.vue";
const props = defineProps({
  data: Object,
});



const images = [
  'car.jpg',
  'cars.webp',
  'clothes.jpg',
  'construction.jpeg',  
  'construction.jpg',
  'construction2.jpg',
  'construction3.jpg',
  'construction4.jpg',
  'construction5.jpg',
  'estate.jpg',
  'estate2.jpg',
  'estate3.jpg',
  'farm.webp',
  'fruits.jpg',
  'house.jpeg',
  'house.jpg',
  'product.webp',
  'shop.jpg',
  'shop2.jpg',
  'shopping.jpg',

]

const images2 = [
{
    path: '/storage/landing/car.jpg'
  }
  ,

  {
    path: '/storage/landing/clothes.jpg'
  }
  , 
  
  {
    path: '/storage/landing/construction.jpg'
  }
  ,
 
 

  {
    path: '/storage/landing/construction4.jpg'
  }
  ,
  {
    path: '/storage/landing/construction5.jpg'
  }
  ,
  // {
  //   path: '/storage/landing/estate.jpg'
  // }
  // ,
  // {
  //   path: '/storage/landing/estate2.jpg'
  // },
  // {
  //   path: '/storage/landing/estate3.jpg'
  // }
  // ,
  // {
  //   path: '/storage/landing/farm.webp'
  // }
  // ,
  {
    path: '/storage/landing/gadgets.jpg'
  }
  ,
  {
    path: '/storage/landing/gadgets2.jpg'
  }
  ,
  {
    path: '/storage/landing/gadgets3.jpg'
  }
  ,
  {
    path: '/storage/landing/shop.jpg'
  }
  ,
  {
    path: '/storage/landing/shop2.jpg'
  }
  ,
  {
    path: '/storage/landing/shopping.jpg'
  }
  ,
]

setInterval(getPath, 1000 * 3);

function getPath() {
  // console.log('Hello world');
  return 'url(' + '/storage/landing/' + random_item(images) + ')';

}
function random_item(images) {

  return images[Math.floor(Math.random() * images.length)];

}
</script>

<style>

</style>
