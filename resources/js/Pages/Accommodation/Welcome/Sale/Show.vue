<template>  
  <accommodation-layout :title="data.accommodation.owner">
    
    <show>
      <template #images>
        <image-detail-display :images="data.accommodation.images" />
      </template>
      <template #details>
        <detail-section
          :item="data.accommodation"
          :rating="data.accommodation.ratings.av_rating"
        >
          <template #heading>
            {{ data.accommodation.a_rooms }} Available Rooms
          </template>
        </detail-section>
      </template>
      <template #owner>
        <owner-section
          class="text-slate-100"
          heading="This accommodation Belongs To"
          :username="data.accommodation.username"
          :owner="data.accommodation.owner"
          :contacts="data.accommodation.contact"
          :documents="data.accommodation.documents"
        />
      </template>
    </show>

    <div>
      <p class="text-2xl font-extrabold text-slate-50 border-b-2">
        Similar Accommodations
      </p>
      <div id="accommodations" v-if="data.similar_accommodations.length">
        <grouped-accommodations
          v-if="data.similar_accommodations"
          :items="data.similar_accommodations"
          routes="welcome.accommodations.show"
          show_more="welcome.accommodations.category_type"
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
      <div id="accommodations" v-if="data.owner_accommodations.length">
        <grouped-accommodations
          v-if="data.owner_accommodations"
          :items="data.owner_accommodations"
          routes="welcome.accommodations.show"
          show_more="welcome.accommodations.owner"
          :type="data.accommodation.username"
          :heading="'More from ' + data.accommodation.owner"
        />
      </div>
      <div v-else>
        <no-result-display />
      </div>
    </div>

    <comment-section 
    :comments=data.accommodation.ratings.comments 
    :item_id="data.accommodation.id"
    comment_path="ratings.add.accommodation"
    />
    
  </accommodation-layout>
</template>
  <script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
import Show from "@/Components/Shared/Show/Show.vue";
import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";
import DetailSection from "@/Components/Shared/Show/DetailSection.vue";
import GroupedAccommodations from "@/Components/Accommodation/GroupedAccommodations.vue";
import CommentSection from "@/Components/Shared/Comment/CommentSection.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";

import { ref } from "vue";

const props = defineProps({
  data: Object,
});

const write_comment = ref(false);
</script>