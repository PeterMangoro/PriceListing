
<template>
  <form-section @submitted="updatePlotDetail">
    <template #title> 
      <p class="text-slate-50">
        Update Plot Images
      </p>
       </template>

    <template #description>
      <p class="text-slate-50">
        For Best display crop your images to square before uploading.
      </p>
     
      <p class="pt-4 text-slate-50">Deleted images are stored and can latter be restored.</p>
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
              <svg class="w-12 h-12 mx-auto text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                aria-hidden="true">
                <path
                  d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
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
                  <input id="images" @input="form.images = $event.target.files" type="file" multiple required
                    @change="onFileChange" />
                </label>
              </div>
              <p class="text-xs text-black">PNG, JPG, GIF up to 10MB</p>
              <InputError class="mt-2" v-for="(error, image) in form.errors.images" :key="image" :message="error" />
            </div>
          </div>
        </div>
      </div>
    </template>

    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

      <submit-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Save
      </submit-button>
    </template>
  </form-section>
  <edit-image-card class="mt-2" :images="plot.attachments" />
<edit-image-card class="mt-2" :images="plot.trashed_images" />
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
import { pointConverter } from "@/Composables/pointConverter";

const props = defineProps({
  plot: String,
});
const form = useForm({
  size: props.plot.size,
  images: null,
  groups: [],
  price: props.plot.price,
  detail: pointConverter(props.plot.detail),
  category: null,
  plot_id: props.plot.id,
  sale_status: props.plot.sale_status,
  street: props.plot.address.street,
  town: props.plot.address.town,
  city: props.plot.address.city,
  country: props.plot.address.country,
  remember: true,
  _method: "PUT",
});

function saleStatus() {
  if (form.sale_status == true) {
    return "Currently Active";
  } else return "Currently Inactive";
}

const updatePlotDetail = () => {
  form.post(route("plots.update", props.plot.uuid), {
    errorBag: "updatePlotDetail",
    preserveScroll: true,
  });
};
</script>
