<template>  
  <service-layout :title="data.service.title">
    
    <show>
      <template #images>
        <image-detail-display :images="data.service.images" />
      </template>
      <template #details>
        <detail-section
          :item="data.service"
          :rating="data.service.ratings.av_rating"
        >
          <template #heading>
            {{ data.service.title }}
          </template>
        </detail-section>
      </template>
      <template #owner>
        <owner-section
          class="text-slate-100"
          heading="This service Belongs To"
          :username="data.service.username"
          :owner="data.service.owner"
          :contacts="data.service.contact"
          :documents="data.service.documents"
        />
      </template>
    </show>

    <div>
      <p class="text-2xl font-extrabold text-slate-50 border-b-2">
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
      <p class="text-2xl font-extrabold text-slate-50 border-b-2">
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

    <comment-section 
    :comments=data.service.ratings.comments 
    :item_id="data.service.id"
    comment_path="ratings.add.service"
    />
    
  </service-layout>
</template>
  <script setup>
import ServiceLayout from "@/Layouts/ServiceLayout.vue";
import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
import Show from "@/Components/Shared/Show/Show.vue";
import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";
import DetailSection from "@/Components/Shared/Show/DetailSection.vue";
import GroupedServices from "@/Components/Service/GroupedServices.vue";
import CommentSection from "@/Components/Shared/Comment/CommentSection.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";

import { ref } from "vue";

const props = defineProps({
  data: Object,
});

const write_comment = ref(false);
</script>