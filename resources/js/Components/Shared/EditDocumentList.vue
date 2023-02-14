<template>
<div class="p-2">
<div class="p-2 ">
    <div class="flex flex-wrap justify-between gap-2 pt-2">
   
    <span
      v-for="document in documents"
      :key="document.id"
      class="flex flex-wrap justify-between gap-2 p-3 bg-white rounded-md"
    >
      <a 
      class="hover:cursor-pointer hover:scale-105 hover:text-black hover:duration-500"
      :href="route(path, document.uuid)" target="_blank"
        >📃{{ document.name }}</a
      >
      <div class="flex justify-center">
        <button
          v-if="document.deleted_at"
          @click="restoreDocument(document.id)"
          class="p-1 ml-2 text-white bg-blue-500 rounded justify-items-center"
        >
          Restore
        </button>
        <button
          v-else
          @click="confirmDocumentDeletion(document.id)"
          class="p-1 ml-2 text-white bg-red-500 rounded justify-items-center"
        >
          Delete
        </button>
      </div>
    </span>
  </div>
</div>
  </div>

    <JetConfirmationModal
    :show="confirmingDocumentDeletion"
    @close="confirmingDocumentDeletion = false"
  >
    <template #title> Delete Document </template>

    <template #content>
      Are you sure you want to delete this document? Deleted documents can not be seen
      by customers, but be found in the Trash and can be recycled later.
    </template>

    <template #footer>
      <JetSecondaryButton @click="confirmingDocumentDeletion = false">
        Cancel
      </JetSecondaryButton>

      <JetDangerButton
        class="ml-3"
        
        @click="deleteDocument(documentToBeDeleted)"
      >
        Delete Document
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
  documents: Object,
  path: String,
});


const confirmingDocumentDeletion = ref(false);
const documentToBeDeleted = ref(null);


function confirmDocumentDeletion(document) {
  confirmingDocumentDeletion.value = true;
  documentToBeDeleted.value = document;
}

function deleteDocument(document) {
  router.delete(route("attachments.destroy", document), {
    errorBag: "deleteDocument",
    preserveScroll: true,
  });
  confirmingDocumentDeletion.value = false;
}

function restoreDocument(document) {
  router.post(route("attachment.restore", document), {
    errorBag: "restoreDocument",
    preserveScroll: true,
  });
  confirmingDocumentDeletion.value = false;
}
</script>

<style>
</style>