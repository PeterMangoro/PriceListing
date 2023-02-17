<template>
  <accommodation-layout>
    <div class="flex flex-wrap p-10 justify-evenly">
      <div class="">
        <image-detail-display class="" :images="data.accommodation.images" />
      </div>
      <div class="sm:w-1/3">
        <accommodation-details
          :accommodation="data.accommodation"
          :rating="data.accommodation.ratings.av_rating"
        />
      </div>
      <div class="sm:w-1/3">
        <owner-section
          heading="This accommodation Belongs To"
          :username="data.accommodation.username"
          :owner="data.accommodation.owner"
          :contacts="data.accommodation.contact"
          :documents="data.accommodation.documents"
        />
      </div>
    </div>

    <div>
      <p
        class="
          text-2xl
          font-extrabold
          text-black
          capitalize
          border-b-4 border-blue-600
        "
      >
        More from {{ data.accommodation.location.city }}
      </p>
      <div id="accommodations" v-if="data.similar_accommodations.length">
        <grouped-accommodations
          v-if="data.similar_accommodations"
          :items="data.similar_accommodations"
          routes="welcome.accommodations.show"
          show_more="welcome.accommodations.location"
          :type="data.accommodation.location.city.replaceAll(' ', '_')"
          heading="Check These Out"
        />
      </div>
      <div v-else>
        <no-result-display />
      </div>
    </div>

    <div>
      <p class="text-2xl font-extrabold text-black border-b-4 border-blue-600">
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

    <div>
      <p
        class="
          text-2xl
          font-extrabold
          text-black
          capitalize
          border-b-4 border-blue-600
        "
      >
        What Others have to say
      </p>
      <div class="p-3">
        <div
          class="flex p-3 mx-auto rounded-lg shadow-xl bg-slate-50 max-w-7xl"
        >
          <div
            v-if="data.accommodation.ratings.comments.length"
            class="flex flex-wrap w-full justify-evenly"
          >
            <div class="w-full">
              <span
                @click="show_write_comment"
                class="
                  inline-flex
                  justify-center
                  px-8
                  py-2
                  text-sm
                  font-medium
                  text-black
                  capitalize
                  border border-transparent
                  rounded
                  hover:cursor-pointer hover:border-green-500
                "
              >
                add Comment
              </span>
            </div>
            <comment-card
              v-for="comment in data.accommodation.ratings.comments"
              :key="comment.id"
              :comment="comment"
            />
          </div>
          <div v-else class="flex justify-center w-full">
            <div class="items-center w-full text-2xl font-semibold">
              No Reviews yet
            </div>

            <div class="w-full">
              <span
                @click="show_write_comment"
                class="
                  inline-flex
                  justify-center
                  px-8
                  py-2
                  text-sm
                  font-medium
                  text-black
                  capitalize
                  border border-transparent
                  rounded
                  hover:cursor-pointer hover:border-green-500
                "
              >
                add Comment
              </span>
            </div>
          </div>
        </div>

        <div v-if="write_comment" class="">
          <rating-form
            path="ratings.add.accommodation"
            :id="data.accommodation.id"
          />
        </div>
      </div>
    </div>
  </accommodation-layout>
</template>
<script setup>
import AccommodationLayout from "@/Layouts/AccommodationLayout.vue";
import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
import OwnerContacts from "@/Components/Shared/Owner/OwnerContacts.vue";
import AccommodationDetails from "@/Components/Accommodation/AccommodationDetails.vue";
import GroupedAccommodations from "@/Components/Accommodation/GroupedAccommodations.vue";
import CommentCard from "@/Components/Partials/Common/CommentCard.vue";
import RatingForm from "@/Components/Shared/Form/RatingForm.vue";
import DocumentList from "@/Components/Partials/DocumentList.vue";
import NoResultDisplay from "@/Components/Partials/NoResultDisplay.vue";
import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";

import { ref } from "vue";

const props = defineProps({
  data: Object,
});

const write_comment = ref(false);

function show_write_comment() {
  write_comment.value = true;
}
</script>