
<template>
  <form-section @submitted="updatePlotDetail">
    <template #title> Category Selection </template>

    <template #description>
      Categories are helpful in grouping your plots according to client
      preferences
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-6">
        <div>
          <h1 class="my-1 text-base font-bold capitalize">
            previously selected categories
          </h1>
          <span class="flex flex-wrap justify-evenly justify-self-start jus">
            <p
              v-for="category in plot.categories"
              :key="category.id"
              class="flex"
            >
              <check-circle-icon class="w-4 h-4 my-auto fill-green-500" />
              {{ category.title }}
            </p>
          </span>
        </div>
        <p class="my-1 border-b-2"></p>
        <input-label
          for="categories"
          value="Select New Categories"
          class="mt-2 text-base font-bold capitalize"
        />
        <span class="gap-1">
          <p class="text-sm italic text-slate-800">
            <information-circle-icon
              class="float-left w-4 h-4 mr-1"
            />previously selected categories will be replace with new ones, so
            reselect all categories you want
          </p>
        </span>
        <p class="my-1 border-b-2"></p>
        <input-error class="mt-2" :message="form.errors.categories" />
        <span
          v-for="(category_type, type) in category_types"
          :key="type"
          class="flex gap-2"
        >
          <h1
            @click="showCategoryType(type)"
            class="
              py-1
              text-sm
              font-semibold
              text-black
              underline
              capitalize
              hover:cursor-pointer
            "
          >
            {{ type }}
            <!-- <chevron-double-right-icon class="w-4 h-4 text-red-600" /> -->
          </h1>

          <span v-if="type === categoryType">
            <check-box-group
              v-for="category in category_type"
              :key="category.id"
              :items="[
                {
                  label: category.title,
                  id: category.id,
                },
              ]"
              @on-change="onChange"
            />
          </span>
        </span>
      </div>
      <input-error
        v-if="form.errors.categories"
        class="mt-2 capitalize"
        message="Error Found!! Please check the previous form"
      />
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
import CheckBoxGroup from "@/Components/Shared/Checkbox/check-box-group.vue";
import { pointConverter } from "@/Composables/pointConverter";
import {
  ChevronDoubleRightIcon,
  CheckCircleIcon,
} from "@heroicons/vue/24/solid";
import { InformationCircleIcon } from "@heroicons/vue/24/outline";

const detailInput = ref(null);
const plotInput = ref(null);
const props = defineProps({
  plot: Object,
  category_types: Object,
});
const form = useForm({
  size: props.plot.size,
  images: null,
  groups: [],
  price: props.plot.price,
  detail: pointConverter(props.plot.detail),
  categories: [],
  plot_id: props.plot.id,
  sale_status: props.plot.sale_status,
  remember: true,
});

const onChange = (val) => {
  console.log(val);
  val[0].checked === true
    ? form.categories.push(val[0].id)
    : form.categories.pop(val[0].id);
};

const categoryType = ref(null);

function showCategoryType(type) {
  categoryType.value = type;
}

const updatePlotDetail = () => {
  form.put(route("plots.update", props.plot.uuid), {
    errorBag: "updatePlotDetail",
    preserveScroll: true,
  });
};
</script>
