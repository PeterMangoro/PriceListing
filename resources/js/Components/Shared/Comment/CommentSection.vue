<template>
  <div class="">
    <p
      class="
        text-2xl
        font-extrabold
        text-slate-50
        capitalize
        border-b-2
        flex flex-wrap
        gap-2
      "
    >
      What Others have to say

      <span
        @click="write_comment = !write_comment"
        class="
          inline-flex
          justify-center
          px-8
          py-2
          mb-2
          text-sm
          font-medium
          text-slate-50
          capitalize
          border
          rounded
          hover:cursor-pointer
          border-green-500
        "
      >
        Comment
      </span>
    </p>
    <div class="p-3">
      <div class="flex p-3 mx-auto rounded-lg shadow-xl max-w-7xl">
        <div
          v-if="comments.length"
          class="flex flex-wrap w-full justify-evenly"
        >
          <comment-card
            class="text-white"
            v-for="comment in comments"
            :key="comment.id"
            :comment="comment"
          />
        </div>
        <div v-else class="flex justify-center w-full">
          <div class="items-center w-full text-2xl font-semibold text-slate-50">
            No Reviews yet
          </div>

          <div class="w-full"></div>
        </div>
      </div>

      <div v-if="write_comment" class="">
        <rating-form
          :path="comment_path"
          :id="item_id"
          @close="write_comment = false"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import CommentCard from "@/Components/Shared/Comment/CommentCard.vue";
import RatingForm from "@/Components/Shared/Form/RatingForm.vue";
import { ref } from "vue";

const props = defineProps({
    comments : Object,
    item_id : Number,
    comment_path : String
})
const write_comment = ref(false);
</script>

