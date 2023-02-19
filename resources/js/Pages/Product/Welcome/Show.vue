<template>
  <product-layout>
    <div class="flex flex-wrap p-10 justify-evenly">
      <div class="">
        <image-detail-display class="" :images="data.product.images" />
      </div>
      <div class="sm:w-1/3">
        <product-details
          :product="data.product"
          :rating="data.product.ratings.av_rating"
        />
      </div>
      <div class="sm:w-1/3">
        <owner-section
          class="text-slate-100"
          heading="This product Belongs To"
          :username="data.product.username"
          :owner="data.product.owner"
          :contacts="data.product.contact"
          :documents="data.product.documents"
        />
      </div>
    </div>

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

    <div>
      <p class="text-2xl font-extrabold text-slate-50 capitalize border-b-2">
        What Others have to say
      </p>
      <div class="p-3">
        <div
          class="flex p-3 mx-auto rounded-lg shadow-xl bg-slate-50 max-w-7xl"
        >
          <div
            v-if="data.product.ratings.comments.length"
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
                  border 
                  rounded
                  hover:cursor-pointer border-green-500
                "
              >
                add Comment
              </span>
            </div>
            <comment-card
              v-for="comment in data.product.ratings.comments"
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
                  text-slate-50
                  capitalize
                  border 
                  rounded
                  hover:cursor-pointer border-green-500
                "
              >
                add Comment
              </span>
            </div>
          </div>
        </div>

        <div v-if="write_comment" class="">
          <rating-form path="ratings.add.product" :id="data.product.id" />
        </div>
      </div>
    </div>
  </product-layout>
</template>
  <script setup>
import ProductLayout from "@/Layouts/ProductLayout.vue";
import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";
import ProductDetails from "@/Components/Product/ProductDetails.vue";
import GroupedProducts from "@/Components/Product/GroupedProducts.vue";
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