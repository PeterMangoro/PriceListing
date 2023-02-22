<template>  
  <car-layout :title="data.car.car_make">
    
    <show>
      <template #images>
        <image-detail-display :images="data.car.images" />
      </template>
      <template #details>
        <detail-section
          :item="data.car"
          :rating="data.car.ratings.av_rating"
        >
          <template #heading>
            {{ data.car.car_make }} <br>
            {{ data.car.car_model }}
          </template>
        </detail-section>
      </template>
      <template #owner>
        <owner-section
          class="text-slate-100"
          heading="This car Belongs To"
          :username="data.car.username"
          :owner="data.car.owner"
          :contacts="data.car.contact"
          :documents="data.car.documents"
        />
      </template>
    </show>

    <div>
      <p class="text-2xl font-extrabold text-slate-50 border-b-2">
        Similar Cars
      </p>
      <div id="cars" v-if="data.similar_cars.length">
        <grouped-cars
          v-if="data.similar_cars"
          :items="data.similar_cars"
          routes="welcome.cars.show"
          show_more="welcome.cars.category_type"
          :type="data.category_type"
          heading="Check These Out"
        />
      </div>
      <div v-else>
        <no-result-display />
      </div>
    </div>

    <div>
      <p class="text-2xl font-extrabold text-slate-50 border-b-2">
        From the Same Supplier
      </p>
      <div id="cars" v-if="data.owner_cars.length">
        <grouped-cars
          v-if="data.owner_cars"
          :items="data.owner_cars"
          routes="welcome.cars.show"
          show_more="welcome.cars.owner"
          :type="data.car.username"
          :heading="'More from ' + data.car.owner"
        />
      </div>
      <div v-else>
        <no-result-display />
      </div>
    </div>

    <comment-section 
    :comments=data.car.ratings.comments 
    :item_id="data.car.id"
    comment_path="ratings.add.car"
    />
    
  </car-layout>
</template>
  <script setup>
import CarLayout from "@/Layouts/CarLayout.vue";
import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
import Show from "@/Components/Shared/Show/Show.vue";
import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";
import DetailSection from "@/Components/Shared/Show/DetailSection.vue";
import GroupedCars from "@/Components/Car/GroupedCars.vue";
import CommentSection from "@/Components/Shared/Comment/CommentSection.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";

import { ref } from "vue";

const props = defineProps({
  data: Object,
});

const write_comment = ref(false);
</script>