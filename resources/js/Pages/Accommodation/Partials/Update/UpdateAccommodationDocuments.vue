
<template>
  <form-section @submitted="updateAccommodationDetail">
    <template #title> 
      <p class="text-slate-50">
        Update Accommodation Documents
      </p>
      </template>

    <template #description>
      <p class="text-slate-50">
        Upload Accommodation related documents eg. User Manuals
      </p>
     
      <p class="pt-4 text-slate-50">
        Deleted documents are stored and can latter be restored.
      </p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <div>
          <div
            class="
              flex
              justify-center
              px-6
              pt-5
              pb-6
              mt-1
              border-2 border-gray-300 border-dashed
              rounded-md
            "
          >
            <div class="space-y-1 text-center">
              <input-label for="document_title" value="Document Name" />
              <text-input
                id="document_title"
                ref="accommodationInput"
                v-model="form.document_title"
                type="text"
                class="block w-full mt-1"
                autocomplete="document_title"
              />
              <input-error :message="form.errors.document_title" class="mt-2" />
              <div class="flex text-sm text-black">
                <label
                  for="file-upload"
                  class="
                    font-medium
                    text-indigo-600
                    bg-transparent bg-white
                    rounded-md
                    cursor-pointer
                    hover:text-indigo-500
                    focus-within:outline-none
                    focus-within:ring-2
                    focus-within:ring-offset-2
                    focus-within:ring-indigo-500
                  "
                >
                  <span>Upload a new file</span>
                  <input
                    id="images"
                    @input="form.document = $event.target.files[0]"
                    type="file"
                    @change="onFileChange"
                  />
                </label>
              </div>

              <input-error :message="form.errors.document" class="mt-2" />
            </div>
          </div>
        </div>
      </div>
    </template>

    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

      <submit-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Save
      </submit-button>
    </template>
  </form-section>
  <edit-document-list
    :documents="accommodation.documents"
    path="attachments.show"
  />
  <edit-document-list
    :documents="accommodation.trashed_documents"
    path="attachments.show"
  />
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/Shared/Form/ActionMessage.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import EditImageCard from "@/Components/Shared/EditImageCard.vue";
import EditDocumentList from "@/Components/Shared/EditDocumentList.vue";
import { pointConverter } from "@/Composables/pointConverter";

const props = defineProps({
  accommodation: String,
});
const form = useForm({
  a_rooms: props.accommodation.a_rooms,
  images: null,
  groups: [],
  price: props.accommodation.price,
  detail: pointConverter(props.accommodation.detail),
  street: props.accommodation.address.street,
  town: props.accommodation.address.town,
  city: props.accommodation.address.city,
  country: props.accommodation.address.country,
  category: null,
  accommodation_id: props.accommodation.id,
  sale_status: props.accommodation.sale_status,
  document_title: null,
  document: null,
  remember: true,
  _method: "PUT",
});

function saleStatus() {
  if (form.sale_status == true) {
    return "Currently Active";
  } else return "Currently Inactive";
}

const updateAccommodationDetail = () => {
  form.post(route("accommodations.update", props.accommodation.uuid), {
    errorBag: "updateAccommodationDetail",
    preserveScroll: true,
  });
};
</script>
