<template>
  <app-layout>

    <div class="pb-3">
      <landing-page :images="images2" class="pb-3" />
      <div class="flex flex-wrap w-auto gap-3 justify-evenly m-2  ">
        <welcome-card image="/storage/landing/clothes.jpg" heading="Marketplace"
          detail="Shop from different suppliers at the cheapest price for the highest quality"
          path="welcome.products.index" />

        <welcome-card image="/storage/landing/cars.webp" heading="Car Sale"
          detail="Find the best car deals and drive the car of your dreams" path="welcome.cars.index" />

        <welcome-card image="/storage/landing/house.jpeg" heading="Accommodation"
            detail="Find the place you will call home " path="welcome.accommodations.index" />

        <welcome-card image="/storage/landing/farm.webp" heading="Real Estate"
          detail="Purchase land for your projects at good strategic locations " path="welcome.plots.index" />

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
    id: 1,
    path: '/storage/landing/car.jpg'
  }
  ,

  {
    id: 2,
    path: '/storage/landing/clothes.jpg'
  }
  ,

  {
    id: 3,
    path: '/storage/landing/construction.jpg'
  }
  ,



  {
    id:4,
    path: '/storage/landing/construction4.jpg'
  }
  ,
  {
    id:5,
    path: '/storage/landing/construction5.jpg'
  }
  ,
  {
    id:6,
    path: '/storage/landing/estate.jpg'
  }
  ,
  {
    id:7,
    path: '/storage/landing/estate2.jpg'
  },
  {
    id:8,
    path: '/storage/landing/estate3.jpg'
  }
  ,
  {
    id:9,
    path: '/storage/landing/farm.webp'
  }
  ,
  {
    id:10,
    path: '/storage/landing/gadgets.jpg'
  }
  ,
  {
    id:11,
    path: '/storage/landing/gadgets2.jpg'
  }
  ,
  {
    id:12,
    path: '/storage/landing/gadgets3.jpg'
  }
  ,
  {
    id:13,
    path: '/storage/landing/shop.jpg'
  }
  ,
  {
    id:14,
    path: '/storage/landing/shop2.jpg'
  }
  ,
  {
    id:15,
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

<style></style>
