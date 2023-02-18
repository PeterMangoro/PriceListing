
<template>
  <form-section @submitted="updateCarDetail">
    <template #title> <p class="text-slate-50">Update Car</p>  </template>

    <template #description>
      <p class="text-slate-50">
        Ensure your Car is described in detail so that clients understand it
      better.
      </p>
     
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <div class="col-span-6 sm:col-span-3 my-2">
          <fieldset>
            <div class="text-base font-medium text-black" aria-hidden="true">
              Mark Appropriate Action For Your Vehicle
            </div>
            <div class="mt-4 space-y-4">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input
                    v-model="form.rent_status"
                    id="rent_status"
                    name="rent_status"
                    type="checkbox"
                    class="
                      w-4
                      h-4
                      text-indigo-600
                      border-gray-300
                      rounded
                      focus:ring-indigo-500
                    "
                  />
                </div>

                <div class="ml-3 text-sm">
                  <label for="comments" class="font-medium text-black"
                    >Car Hire/Rent</label
                  >
                  <p class="text-black">Let your car be up for Hiring.</p>
                </div>
              </div>
              <InputError class="mt-2" :message="form.errors.rent_status" />
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input
                    v-model="form.sale_status"
                    id="sale_status"
                    name="sale_status"
                    type="checkbox"
                    class="
                      w-4
                      h-4
                      text-indigo-600
                      border-gray-300
                      rounded
                      focus:ring-indigo-500
                    "
                  />
                </div>
                <div class="ml-3 text-sm">
                  <label for="candidates" class="font-medium text-black"
                    >Sale</label
                  >
                  <p class="text-black">Let your car be sold in the market.</p>
                </div>
              </div>
              <InputError class="mt-2" :message="form.errors.sale_status" />
            </div>
          </fieldset>
        </div>
        <div class="col-span-3 sm:col-span-3 my-2">
          <label for="car_make" class="block text-sm font-medium text-black"
            >Car Make</label
          >
          <select
            v-model="form.car_make_id"
            id="car_make_id"
            required
            autocomplete="car_make_id"
            class="
              block
              w-full
              px-3
              py-2
              mt-1
              bg-transparent
              border border-gray-300
              rounded-md
              shadow-sm
              focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
            "
          >
            <option
              class=""
              v-for="car in car_makes"
              :key="car.id"
              :value="car.id"
            >
              {{ car.title }}
            </option>
          </select>
        </div>

        <div class="col-span-3 sm:col-span-3 my-2">
          <label for="country" class="block text-sm font-medium text-black"
            >Car Model</label
          >
          <select
            v-model="form.car_model_id"
            id="car_model_id"
            required
            autocomplete="car_model_id"
            class="
              block
              w-full
              px-3
              py-2
              mt-1
              bg-transparent bg-white
              border border-gray-300
              rounded-md
              shadow-sm
              focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
            "
          >
            <option
              class=""
              v-for="carmodel in car_makes[form.car_make_id-1].car_models"
              :key="carmodel.id"
              :value="carmodel.id"
            >
              {{ carmodel.title }}
            </option>
          </select>
        </div>

        <div class="col-span-6 sm:col-span-4">
          <InputLabel for="detail" value="Car Description" />
          <TextArea
            id="detail"
            v-model="form.detail"
            type="text"
            rows="5"
            class="block w-full mt-1"
            required
            autofocus
            autocomplete="detail"
          />
          <InputError class="mt-2" :message="form.errors.detail" />
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
const carInput = ref(null);

const props = defineProps({
  car: Object,
  car_makes: Object,
});
const form = useForm({
  title: props.car.title,
  images: null,
  groups: [],
  price: props.car.price,
  detail:  pointConverter(props.car.detail),
  street: props.car.address.street,
  town: props.car.address.town,
  city: props.car.address.city,
  country: props.car.address.country,
  category: null,
  car_id: props.car.id,
  sale_status: props.car.sale_status,
  rent_status: props.car.rent_status,
  car_model_id: props.car.car_model_id,
  car_make_id: props.car.car_make_id,
  num_plate: props.car.num_plate,
  

  remember: true,
});

function saleStatus() {
  if (form.sale_status == true) {
    return "Currently Active";
  } else return "Currently Inactive";
}

const updateCarDetail = () => {
  form.put(route("cars.update", props.car.uuid), {
    errorBag: "updateCarDetail",
    preserveScroll: true,
  });
};
</script>
