
<template>
  <form-section @submitted="updateInsuranceDetail">
    <template #title> <p class="text-slate-50">Update Insurance</p>  </template>

    <template #description>
      <p class="text-slate-50">
        Ensure your Insurance is described in detail so that clients understand it
      better.
      </p>
     
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <div class="col-span-6 sm:col-span-6">
          <fieldset>
            <div class="text-base font-medium text-black" aria-hidden="true">
              Mark Appropriate Action For Your Vehicle
            </div>
            <div class="mt-4 space-y-4">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input
                    v-model="form.car_insurance"
                    id="car_insurance"
                    name="car_insurance"
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
                    >Car Insurance</label
                  >
                  <!-- <p class="text-black">Let your car be up for Hiring.</p> -->
                </div>
              </div>
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input
                    v-model="form.zimra"
                    id="zimra"
                    name="zimra"
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
                    >Zimra</label
                  >
                  <!-- <p class="text-black">Let your car be sold in the market.</p> -->
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-span-6 sm:col-span-4">
        <input-label for="owner" value="Customer Full Name" />

        <text-input
          id="owner"
          ref="carName"
          v-model="form.owner"
          type="text"
          class="block w-full mt-1"
          autocomplete="owner"
        />
      </div>

      <!-- <div class="col-span-6 sm:col-span-4">
        <input-label for="national_id" value="Customer ID/Passport Number" />

        <text-input
          id="national_id"
          ref="nationalId"
          v-model="form.national_id"
          type="text"
          class="block w-full mt-1"
          autocomplete="national_id"
        />
      </div> -->

      <div class="col-span-6 sm:col-span-4">
        <input-label for="contact" value="Customer Contact Details" />
        <text-area
          id="contact"
          ref="contactInput"
          v-model="form.contact"
          type="text"
          class="block w-full mt-1"
          autocomplete="contact"
          rows="5"
          required
        />
      </div>

        <div class="col-span-6 sm:col-span-4">
          <input-label for="cat_title" value="Car" />
                    
            <text-input
              id="car_title"
              ref="carTitle"
              v-model="form.car_title"
              type="text"          
              class="block w-full mt-1 "
              autocomplete="car_title"
            />
        
        </div>

        <div class="col-span-6 sm:col-span-4">
          <input-label for="car_reg" value="Car Registration Number" />
                    
            <text-input
              id="car_reg"
              ref="carReg"
              v-model="form.car_reg"
              type="text"          
              class="block w-full mt-1 "
              autocomplete="car_reg"
            />
        
        </div>

        <div class="col-span-6 sm:col-span-4">
        <input-label for="date" value="Expiry Date" />
        <text-input
          id="reg_exp"
          ref="dateInput"
          v-model="form.reg_exp"
          type="date"
          class="block w-full mt-1"
        />

        <!-- <input-error :message="form.errors.date" class="mt-2" /> -->
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
  insurance: Object,
  car_makes: Object,
});

const form = useForm({
  owner:props.insurance.owner,
national_id:props.insurance.national_id,
contact:pointConverter(props.insurance.contact),
  zimra: null ,
  car_title: props.insurance.car_title,
car_insurance: null,
car_reg: props.insurance.car_reg,
reg_exp: props.insurance.reg_exp,
  remember: true,
});

if (props.insurance.zimra==1) {
  form.zimra = true
}
if (props.insurance.car_insurance==1) {
  form.car_insurance = true
}
function saleStatus() {
  if (form.sale_status == true) {
    return "Currently Active";
  } else return "Currently Inactive";
}

const updateInsuranceDetail = () => {
  form.put(route("car-insurance.update", props.insurance.uuid), {
    errorBag: "updateInsuranceDetail",
    preserveScroll: true,
  });
};
</script>
