<template>
  <car-layout>

    <div class="p-4">


      <div class="px-2">
        <!-- <div
          id="cars"
          class="flex flex-wrap px-20 justify-evenly"
          v-if="data.pool.featured_cars"
        >
          <div>
            <featured-cars
              heading="Recent Arrivals "
              :items="data.pool.recent_cars"
              routes="welcome.cars.show"
              show_more="welcome.cars.recent"
            />
          </div>

          <div>
            <featured-cars
              heading="Featured Cars "
              :items="data.pool.featured_cars"
              routes="welcome.cars.show"
              show_more="welcome.cars.featured"
            />
          </div>

          <div>
            <featured-cars
              heading="Top Talks "
              :items="data.pool.top_talks"
              routes="welcome.cars.show"
              show_more="welcome.cars.top_talks"
            />
          </div>

           <div>
            <featured-cars
              heading="Discounted For You  💰"
              :items="data.pool.discounted_cars"
              routes="welcome.cars.show"
              show_more="welcome.cars.discounted"
            />
          </div>

          <div>
            <Link href="listOfAllCategories">
              <featured-category-cars
                heading="Shop By Categories  🏷"
                :items="data.pool.top_selling"
                routes="welcome.cars.show"
              />
            </Link>
          </div> -->

        <!-- <div>
            <featured-cars
              heading="Just For You  🎁"
              :items="data.pool.for_you"
              routes="welcome.cars.show"
            />
          </div> 
        </div> -->

        <div id="cars" v-if="data.cars.data">
          <p class="text-2xl font-extrabold text-slate-50 border-b-4">
            Available Cars
          </p>
          <all-cars v-if="data.cars" :items="data.cars.data" :pagination="data.cars.links" routes="welcome.cars.index"
            :categories="data.category_types" route_type="welcome.cars.category_type" />
        </div>


      </div>
    </div>
  </car-layout>
</template>

<script setup>
import CarLayout from "@/Layouts/CarLayout.vue";
import FeaturedCars from "@/Components/Car/FeaturedCars.vue";
import FeaturedCategoryCars from "@/Components/Car/FeaturedCategoryCars.vue";
import AllCars from "@/Components/Car/AllCars.vue";
import GroupedCars from "@/Components/Car/GroupedCars.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>

</style>