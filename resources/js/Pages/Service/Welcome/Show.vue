<template>
    <service-layout>
      <div class="flex flex-wrap p-10 justify-evenly">
        <div class="">
          <image-detail-display class="" :images="data.service.images" />
        </div> 
        <div class="sm:w-1/3">
          <service-details
            :service="data.service"
            :rating="data.service.ratings.av_rating"
          />
        </div>
        <div class="sm:w-1/3">
          <owner-section
          class="text-slate-100 "
            heading="This service Belongs To"
            :username="data.service.username"
            :owner="data.service.owner"
            :contacts="data.service.contact"
            :documents="data.service.documents"
          />
        </div>
      </div>
  
      <div>
        <p class="text-2xl font-extrabold text-slate-50 border-b-4">
          Similar Services
        </p>
        <div id="services" v-if="data.similar_services.length">
          <grouped-services
            v-if="data.similar_services"
            :items="data.similar_services"
            routes="welcome.services.show"
            show_more="welcome.services.category_type"
            :type="data.category_type"
            heading="Check These Out"
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
        <div id="services" v-if="data.owner_services.length">
          <grouped-services
            v-if="data.owner_services"
            :items="data.owner_services"
            routes="welcome.services.show"
            show_more="welcome.services.owner"
            :type="data.service.username"
            :heading="'More from ' + data.service.owner"
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
              v-if="data.service.ratings.comments.length"
              class="flex flex-wrap w-full justify-evenly"
            >
              <div class="w-full">
                <span
                  @click="show_write_comment"
                  class="inline-flex justify-center px-8 py-2 text-sm font-medium text-black capitalize border border-transparent rounded hover:cursor-pointer hover:border-green-500"
                >
                  add Comment
                </span>
              </div>
              <comment-card
                v-for="comment in data.service.ratings.comments"
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
                  class="inline-flex justify-center px-8 py-2 text-sm font-medium text-slate-50 capitalize border border-transparent rounded hover:cursor-pointer hover:border-green-500"
                >
                  add Comment
                </span>
              </div>
            </div>
          </div>
  
          <div v-if="write_comment" class="">
            <rating-form path="ratings.add.service" :id="data.service.id" />
          </div>
        </div>
      </div>
    </service-layout>
  </template>
  <script setup>
  import ServiceLayout from "@/Layouts/ServiceLayout.vue";
  import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
  import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";
  import ServiceDetails from "@/Components/Service/ServiceDetails.vue";
  import GroupedServices from "@/Components/Service/GroupedServices.vue";
  import CommentCard from "@/Components/Shared/Comment/CommentCard.vue";
  import RatingForm from "@/Components/Shared/Form/RatingForm.vue";
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