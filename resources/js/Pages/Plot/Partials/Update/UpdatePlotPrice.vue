
<template>
  <form-section @submitted="updatePlotDetail">
    <template #title>
      <p class="text-slate-50">
        Update Pricing
      </p>
      </template>

    <template #description>
      <p class="text-slate-50">
        Change the price by updating the current price field .<br>
        You can also add
        Discount Price to your plot
      </p>
     
      <!-- You can also add
        Discount Price to your plot -->
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="price" value="Current Price" />
        <div class="flex">
          <span
            class="inline-flex items-center px-3 mt-1 text-sm text-gray-500 bg-white border border-gray-300 shadow-sm rounded-l-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">$</span>
          <text-input id="price" ref="plotPrice" v-model="form.price" type="number" step="0.01"
            class="block w-full mt-1 rounded-none rounded-r-md" autocomplete="price" />
        </div>

        <input-error :message="form.errors.price" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
          <input-label for="price" value="Discount Price" />
          <div class="flex">
            <span
              class="inline-flex items-center px-3 mt-1 text-sm text-gray-500 bg-white border border-gray-300 shadow-sm rounded-l-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              >$</span
            >
            <text-input
              id="discount"
              ref="plotDiscountPrice"
              v-model="form.discount"
              type="number"
              step="0.01"
              class="block w-7/12 mt-1 rounded-none"
              autocomplete="discount"
            />
            <span
              class="inline-flex items-center w-5/12 px-3 mt-1 text-sm text-gray-500 bg-white border border-gray-300 shadow-sm rounded-r-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              >{{ percent() }}
            </span>
          </div>
          <input-error :message="form.errors.discount" class="mt-2" />
        </div>

      <div class="col-span-6 sm:col-span-4">
          <input-label for="date" value="Discount End Date" />
          <text-input
            id="date"
            ref="dateInput"
            v-model="form.date"
            type="datetime-local"
            class="block w-full mt-1"
          />

          <input-error :message="form.errors.date" class="mt-2" />
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
const plotPrice = ref(null);
const plotDiscountPrice = ref(null);

const props = defineProps({
  plot: Object,
});

const form = useForm({
  size: props.plot.size,
  images: null,
  groups: [],
  price: props.plot.price,
  discount: props.plot.discount_price,
  date: props.plot.discount_exp_date,
  detail: pointConverter(props.plot.detail),
  category: null,
  plot_id: props.plot.id,
  sale_status: props.plot.sale_status,
  street: props.plot.address.street,
  town: props.plot.address.town,
  city: props.plot.address.city,
  country: props.plot.address.country,
  remember: true,
});

function percent() {
  const old_price = form.price;
  const new_price = form.discount;

  if (new_price) {
    if (Math.floor(new_price * 100) > Math.floor(old_price * 100)) {
      return "discount too high";
    }
    const percentage = ((old_price - new_price) / old_price) * 100;
    return percentage.toFixed(2) + " % discount";
  } else return 0 + " % discount";
}

function saleStatus() {
  if (form.sale_status == true) {
    return "Currently Active";
  } else return "Currently Inactive";
}

const updatePlotDetail = () => {
  form.put(route("plots.update", props.plot.uuid), {
    errorBag: "updatePlotDetail",
    preserveScroll: true,
  });
};
</script>
