
<template>
  <form-section @submitted="updateCompanyDetail">
    <template #title> 
      <p class="text-slate-50">
        Update Company Documents
      </p>
       </template>

    <template #description>
      <p class="text-slate-50">
        Upload Company related documents.
      </p>
    
      <p class="pt-2 text-red-500">
        All uploaded documents are visible to the public.
      </p>
      <p class="pt-2 text-slate-50">
        Upload documents
        <span class="font-medium text-red-500">without</span> sensitive
        information
      </p>
      <p class="pt-4 text-slate-50">
        Deleted documents are stored and can latter be restored.
      </p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <div>
          <div class="
                flex
                justify-center
                px-6
                pt-5
                pb-6
                mt-1
                border-2 border-gray-300 border-dashed
                rounded-md
              ">
            <div class="space-y-1 text-center">
              <input-label for="document_title" value="Document Name" />
              <text-input id="document_title" ref="companyInput" v-model="form.document_title" type="text"
                class="block w-full mt-1" autocomplete="document_title" />
              <input-error :message="form.errors.document_title" class="mt-2" />
              <div class="flex text-sm text-black">
                <label for="file-upload" class="
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
                    ">
                  <span>Upload a new file</span>
                  <input id="images" @input="form.document = $event.target.files[0]" type="file" @change="onFileChange" />
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

      <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Save
      </JetButton>
    </template>
  </form-section>
  <edit-document-list :documents="company.documents" path="attachments.show" />
<edit-document-list :documents="company.trashed_documents" path="attachments.show" />
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/Shared/Form/ActionMessage.vue";
import JetButton from "@/Components/PrimaryButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import EditImageCard from "@/Components/Shared/EditImageCard.vue";
import EditDocumentList from "@/Components/Shared/EditDocumentList.vue";

const props = defineProps({
  company: String,
});
const form = useForm({
  document_title: null,
  document: null,
  remember: true,
  //  _method:"PUT"
});

const updateCompanyDetail = () => {
  form.post(route("company_profile.update"), {
    errorBag: "updateCompanyDetail",
    preserveScroll: true,
  });
};
</script>
