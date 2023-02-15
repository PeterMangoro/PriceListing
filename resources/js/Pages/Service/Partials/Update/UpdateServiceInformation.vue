
<template>
  <form-section @submitted="updateServiceDetail">
    <template #title> 
      <p class="text-sky-500">Update Service</p>  </template>

    <template #description>
      <p class="text-slate-100 mb-2"> Ensure your Service is described in detail so that clients understand it
      better.</p>
      <p class="pt-2 text-slate-50">
        For points, mark at the beginning of each point with
        <span class="text-lg font-medium text-slate-50">*</span> eg
      </p>

      <p class="text-slate-50">* Yellow Shirt</p>
      <p class="text-slate-50">* LightWeight Breathable polyester fabric</p>
      <p class="text-slate-50">* Great for Hot Conditions</p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="title" value="Service Title" />
        <text-input
          id="title"
          ref="serviceInput"
          v-model="form.title"
          type="text"
          class="block w-full mt-1"
          autocomplete="title"
        />
        <input-error :message="form.errors.title" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <span class="flex gap-2">
          <text-input
            id="title"
            ref="serviceInput"
            :value="saleStatus()"
            type="text"
            class="block w-full mt-1"
            autocomplete="title"
            disabled
          />
          <span class="m-auto">
            <div
              v-if="form.sale_status == false"
              @click="form.sale_status = true"
              class="
                inline-flex
                items-center
                gap-6
                px-4
                py-2
                text-xs
                font-semibold
                tracking-widest
                text-white
                uppercase
                transition
                bg-blue-600
                border border-transparent
                rounded-md
                hover:cursor-pointer hover:bg-blue-700
                active:bg-blue-900
                focus:outline-none
                focus:border-blue-900
                focus:ring
                focus:ring-blue-300
                disabled:opacity-25
              "
            >
              Activate
            </div>

            <div
              v-else
              @click="form.sale_status = false"
              class="
                inline-flex
                items-center
                gap-6
                px-4
                py-2
                text-xs
                font-semibold
                tracking-widest
                text-white
                uppercase
                transition
                bg-red-600
                border border-transparent
                rounded-md
                hover:cursor-pointer hover:bg-red-700
                active:bg-red-900
                focus:outline-none
                focus:border-red-900
                focus:ring
                focus:ring-red-300
                disabled:opacity-25
              "
            >
              Suspend
            </div>
          </span>
        </span>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="detail" value="Description" />
        <text-area
          id="detail"
          ref="detailInput"
          v-model="form.detail"
          type="password"
          class="block w-full mt-1"
          autocomplete="new-password"
          rows="3"
        />

        <input-error :message="form.errors.detail" class="mt-2" />
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
import { pointConverter } from "@/Composables/pointConverter";

const detailInput = ref(null);
const serviceInput = ref(null);
const props = defineProps({
  service: Object,
});
const form = useForm({
  title: props.service.title,
  images: null,
  groups: [],
  price: props.service.price,
  detail: pointConverter(props.service.detail),
  category: null,
  service_id: props.service.id,
  sale_status: props.service.sale_status,
  remember: true,
});

function saleStatus() {
  if (form.sale_status == true) {
    return "Currently Active";
  } else return "Currently Inactive";
}

const updateServiceDetail = () => {
  form.put(route("services.update", props.service.uuid), {
    errorBag: "updateServiceDetail",
    preserveScroll: true,
  });
};
</script>
