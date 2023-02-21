<template>
  <div class="flex flex-wrap p-10 justify-evenly">
    <div class="">
      <slot name="images" />
    </div>
    <div class="sm:w-1/3">
      <slot name="details" />
    </div>
    <div class="sm:w-1/3">
     <slot name="owner" />
    </div>
  </div>


</template>
<script setup>
import ImageDetailDisplay from "@/Components/Shared/Gallery/ImageDetailDisplay.vue";
import OwnerSection from "@/Components/Shared/Owner/OwnerSection.vue";
import DetailSection from "@/Components/Shared/Show/DetailSection.vue";
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