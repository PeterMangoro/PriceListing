<template>
  <div class="flex flex-wrap justify-evenly">
    <div
      class="mt-2 bg-white rounded-lg shadow-md"
      v-for="image in images"
      :key="image.id"
    >
      <div class="flex justify-center">
        <button
          v-if="image.deleted_at"
          @click="restoreImage(image.id)"
          class="p-1 ml-2 text-white bg-blue-500 rounded justify-items-center"
        >
          Restore
        </button>
        <button
          v-else
          @click="confirmImageDeletion(image.id)"
          class="p-1 ml-2 text-white bg-red-500 rounded justify-items-center"
        >
          Delete
        </button>
      </div>
      <img class="object-cover w-48 h-48 rounded-b-lg" :src="image.path" />
    </div>
  </div>

  <JetConfirmationModal
    :show="confirmingImageDeletion"
    @close="confirmingImageDeletion = false"
  >
    <template #title> Delete Image </template>

    <template #content>
      Are you sure you want to delete this image? Deleted images can not be seen
      by customers, but be found in the Trash and can be recycled later.
    </template>

    <template #footer>
      <JetSecondaryButton @click="confirmingImageDeletion = false">
        Cancel
      </JetSecondaryButton>

      <JetDangerButton
        class="ml-3"
       
        @click="deleteImage(imageToBeDeleted)"
      >
        Delete Image
      </JetDangerButton>
    </template>
  </JetConfirmationModal>
</template>

<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import JetActionSection from "@/Components/ActionSection.vue";
import JetConfirmationModal from "@/Components/ConfirmationModal.vue";
import JetDangerButton from "@/Components/DangerButton.vue";
import JetSecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
  images: Object,
});

const confirmingImageDeletion = ref(false);
const imageToBeDeleted = ref(null);


function confirmImageDeletion(image) {
  confirmingImageDeletion.value = true;
  imageToBeDeleted.value = image;
}

function deleteImage(image) {
  router.delete(route("attachments.destroy", image), {
    errorBag: "deleteImage",
    preserveScroll: true,
  });
  confirmingImageDeletion.value = false;
}

function restoreImage(image) {
  router.post(route("attachment.restore", image), {
    errorBag: "restoreImage",
    preserveScroll: true,
  });
  confirmingImageDeletion.value = false;
}
</script>