<template>
     
   
  <div>
    <div class="bg-white max-w-3xl rounded shadow p-2 m-auto">
      <p class="flex flex-wrap gap-2 border-b p-2">
        <span class="font-bold"> Full name: </span>

        <span>
          {{ form.owner }}
        </span>
      </p>

      <!-- <p class="flex flex-wrap gap-2 border-b p-2">
        <span class="font-bold"> National ID/ Pasport Number: </span>

        <span>
          {{ form.national_id }}
        </span>
      </p> -->

      <p class="flex flex-wrap gap-2 border-b p-2">
        <span class="font-bold"> Contact Details: </span>

        <span>
          <p>
            <item-details :details="cont" />
          </p>
        </span>
      </p>

      <p class="flex flex-wrap gap-2 border-b p-2">
        <span class="font-bold"> Service: </span>

        <span>
          <p v-if="zimra"> Zimra</p>
          <p v-if="car_insurance"> Car Insurance</p>
        </span>
      </p>

      <p class="flex flex-wrap gap-2 border-b p-2">
        <span class="font-bold"> Expiry Date: </span>

        <span>
          <p > 
            
            <!-- {{moment(form.exp_date).format("MMM DD YYYY")}} -->
            {{ DateTime.now().toFormat('MMMM dd, yyyy') }}
        </p>
         
        </span>
      </p>

      <p class="flex flex-wrap gap-2 border-b p-2">
        <span class="font-bold"> Car: </span>

        <span>
          {{ form.car_title }}
        </span>
      </p>

      <p class="flex flex-wrap gap-2 border-b p-2">
        <span class="font-bold"> Car Reg Number: </span>

        <span>
          {{ form.car_reg }}
        </span>
      </p>

      <div class="flex justify-between w-full pt-3">
        <div
          @click="back"
          class="
            gap-2
            p-1
            px-4
            text-black
            rounded
            bg-slate-300
            hover:bg-gray-400 hover:cursor-pointer
          "
        >
          Back
        </div>

        <div
        @click="createProduct"
          class="
            gap-2
            p-1
            px-4
            text-white
            rounded
            bg-green-600
            hover:bg-green-700 hover:cursor-pointer            
          "
        >
          Submit
        </div>
      </div>
    </div>

  </div>

</template>
<script setup>
import { useStorage } from "@/Composables/useStorage";
import { stringToArray } from "@/Composables/stringToArray";
import { useForm } from "@inertiajs/vue3";
import ItemDetails from "@/Components/Shared/ItemDetails.vue";
// import moment from 'moment'
import { DateTime } from "luxon";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";

const name = useStorage("name");
const national_id = useStorage("national_id");
const contact = useStorage("contact");
const zimra = useStorage("zimra");
const car_insurance = useStorage("car_insurance");
const car_title = useStorage("car_title");
const car_reg = useStorage("car_reg");
const exp_date = useStorage("exp_date");

const cont = stringToArray(contact.value, "*");
const form = useForm({
  car_insurance: car_insurance.value, 
  owner: name.value,
  national_id: national_id.value,
  car_reg: car_reg.value,
  reg_exp: exp_date.value,  
  car_title: car_title.value,
  car_insurance: car_insurance.value, 
  contact: contact.value,
  zimra: zimra.value,
  remember: true,
});

const emit = defineEmits(["next", "prev"]);

const createProduct = () => {
  form.post(route("car-insurance.store"), {
    errorBag: "createProduct",
    preserveScroll: true,
    onSuccess: () => {
      localStorage.removeItem("name");
      localStorage.removeItem("national_id");
      localStorage.removeItem("contact");
      localStorage.removeItem("zimra");
      localStorage.removeItem("car_insurance");
      localStorage.removeItem("car_title");
      localStorage.removeItem("car_reg");
      localStorage.removeItem("exp_date");      
    },
  });
};
const back = () => {
  emit("prev");
};
  
</script>