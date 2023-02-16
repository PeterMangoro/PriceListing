<template>
    <car-layout>
      <div class="flex flex-wrap p-10 justify-evenly">
        <div class="">
          <image-detail-display class="" :images="data.car.images" />
        </div>
        <div class="sm:w-1/3">
          <car-details class="text-slate-50" :car="data.car" :rating="data.car.ratings.av_rating" />
        </div>
        <div class="sm:w-1/3 text-slate-50">
          <p>This car belongs to:</p>
  
          <span
            class="text-lg font-medium text-slate-50 underline hover:text-green-300 hover:font-bold hover:duration-200"
          >
            <Link :href="route('company_profile.show', data.car.username)">
              {{ data.car.owner }}
            </Link>
          </span>
  
          <div class="pt-5">
            <owner-contacts :socials="data.car.contact"  />
          </div>
  
          <document-list
            v-if="props.data.car.documents"
            :documents="props.data.car.documents"
            heading="Car Documents"
            path="attachments.show"
            class="text-slate-50"
          />
        </div>
      </div>
  
      <div>
        <p class="text-2xl font-extrabold text-slate-50 border-b-4">Similar Cars</p>
        <div id="cars" v-if="data.similar_cars.length">
          <grouped-cars
            v-if="data.similar_cars"
            :items="data.similar_cars"
            routes="welcome.cars.show"
            show_more="welcome.cars.category_type"
            :type="data.category_type"
            :heading="'Other ' + data.category_type + ' Cars'"
          />
        </div>
         <div v-else>
          <no-result-display />
        </div>
      </div>
  
      <div>
        <p class="text-2xl font-extrabold text-slate-50 border-b-4">
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
  
      <div>
        <p class="text-2xl font-extrabold text-slate-50 capitalize border-b-4">
          What Others have to say
        </p>
        <div class="p-3">
          <div
            class="flex p-3 mx-auto rounded-lg shadow-xl bg-slate-50 max-w-7xl"
          >
            <div
              v-if="data.car.ratings.comments.length"
              class="flex flex-wrap w-full justify-evenly"
            >
              <div class="w-full">
                <span
                  @click="show_write_comment"
                  class="inline-flex justify-center px-8 py-2 text-sm font-medium text-slate-50 capitalize border border-transparent rounded hover:cursor-pointer hover:border-green-500"
                >
                  add Comment
                </span>
              </div>
              <comment-card
                v-for="comment in data.car.ratings.comments"
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
                  class="inline-flex justify-center px-8 py-2 text-sm font-medium text-black capitalize border border-transparent rounded hover:cursor-pointer hover:border-green-500"
                >
                  add Comment
                </span>
              </div>
            </div>
          </div>
  
          <div v-if="write_comment" class="">
            <rating-form path="ratings.add.car" :id="data.car.id" />
          </div>
        </div>
      </div>
    </car-layout>
  </template>
  <script setup>
  import CarLayout from "@/Layouts/CarLayout.vue";
  import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
  import OwnerContacts from "@/Components/Shared/Owner/OwnerContacts.vue";
  import CarDetails from "@/Components/Car/CarDetails.vue";
  import GroupedCars from "@/Components/Car/GroupedCars.vue";
  import CommentCard from "@/Components/Shared/Comment/CommentCard.vue";
  import RatingForm from "@/Components/Shared/Form/RatingForm.vue";
  import DocumentList from "@/Components/Shared/DocumentList.vue";
  import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
  import { ref } from "vue";
  
  const props = defineProps({
    data: Object,
  });
  
  const write_comment = ref(false);
  
  function show_write_comment() {
    write_comment.value = true;
  }
  </script>