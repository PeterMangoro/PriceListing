<template>  
  <PageHead
  description="Find and shop items with at cheap and affordable prices"
    pageTitle="Price listing"
    cover = "/storage/fcc/fcc.png"
  />
  <product-layout :title="data.product.username">
    
    <show>
      <template #images>
        <image-detail-display :images="data.product.images" />
      </template>
      <template #details>
        <detail-section
          :item="data.product"
          :rating="data.product.ratings.av_rating"
        >
          <template #heading>
            {{ data.product.title }}
          </template>
        </detail-section>
      </template>
      <template #owner>
        <owner-section
          class="text-slate-100"
          heading="This product Belongs To"
          :username="data.product.username"
          :owner="data.product.owner"
          :contacts="data.product.contact"
          :documents="data.product.documents"
        />
      </template>
    </show>

    <div>
      <p class="text-2xl font-extrabold text-slate-50 border-b-2">
        Similar Products
      </p>
      <div id="products" v-if="data.similar_products.length">
        <grouped-products
          v-if="data.similar_products"
          :items="data.similar_products"
          routes="welcome.products.show"
          show_more="welcome.products.category_type"
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
      <div id="products" v-if="data.owner_products.length">
        <grouped-products
          v-if="data.owner_products"
          :items="data.owner_products"
          routes="welcome.products.show"
          show_more="welcome.products.owner"
          :type="data.product.username"
          :heading="'More from ' + data.product.owner"
        />
      </div>
      <div v-else>
        <no-result-display />
      </div>
    </div>

    <comment-section 
    :comments=data.product.ratings.comments 
    :item_id="data.product.id"
    comment_path="ratings.add.product"
    />
    
  </product-layout>
</template>
  <script setup>
import ProductLayout from "@/Layouts/ProductLayout.vue";
import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
import Show from "@/Components/Shared/Show/Show.vue";
import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";
import DetailSection from "@/Components/Shared/Show/DetailSection.vue";
import GroupedProducts from "@/Components/Product/GroupedProducts.vue";
import CommentSection from "@/Components/Shared/Comment/CommentSection.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
import PageHead from "@/Components/Shared/PageHead.vue";
import { ref } from "vue";

const props = defineProps({
  data: Object,
});

const write_comment = ref(false);
</script>