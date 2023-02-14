<template>
  <product-layout>
    <!-- <bread-crumb :id="data.product.id" :routes="routes" /> -->

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-product-information :product="data.product"  />
          <JetSectionBorder />
        </div>
        <div >
          <update-product-price :product="data.product" :date = props.data.date />
          <JetSectionBorder />
        </div>
        <div>
          <update-product-categories :product="data.product" :category_types= props.data.category_types />
          <JetSectionBorder />
        </div>
        <div>
          <update-product-images :product="data.product"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-product-documents :product="data.product"  />
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </product-layout>
</template>
<script setup>
import ProductLayout from "@/Layouts/ProductLayout.vue";
import { router  } from "@inertiajs/vue3";
import UpdateProductInformation from "@/Pages/Product/Partials/Update/UpdateProductInformation.vue";
import UpdateProductPrice from "@/Pages/Product/Partials/Update/UpdateProductPrice.vue";
import UpdateProductCategories from "@/Pages/Product/Partials/Update/UpdateProductCategories.vue";
import UpdateProductImages from "@/Pages/Product/Partials/Update/UpdateProductImages.vue";
import UpdateProductDocuments from "@/Pages/Product/Partials/Update/UpdateProductDocuments.vue";
import JetSectionBorder from "@/Components/SectionBorder.vue";

const props = defineProps({
  data: Object,
});


const deleteImage = (attachmentId) => {
  const result = confirm("Delete Image ?");
  if (result) {
    router.delete(route("attachment.delete", attachmentId), {
      preserveScroll: true,
    });
  }
};

const routes = [
  {
    name: "User Products",
    link: "products.index",
  },
  {
    name: "Product-Edit",
    link: "products.edit",
  },
];
</script>
