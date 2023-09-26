
<template >
    <form-section @submitted="addDetail">
      <template #title>
        <p class="text-slate-50 underline">Car Description</p>
      </template>
  
      <template #description>
        <p class="pt-2 text-slate-50">
          For contact, mark at the beginning of each new contact with
          <span class="text-lg font-medium text-slate-50">*</span> eg
        </p>
  
        <p class="text-slate-50">* 0772 123 456</p>
        <p class="text-slate-50">* 0723 987 654 </p>
        <p class="text-slate-50">* example@gmail.com</p>
      </template>
  
      <template #form>
        <div class="col-span-6 sm:col-span-6">
          <fieldset>
            <div class="text-base font-medium text-black" aria-hidden="true">
              Mark Appropriate Action For Your Vehicle
            </div>
            <div class="mt-4 space-y-4">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input
                    v-model="car_insurance"
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
                    v-model="zimra"
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
          <input-label for="name" value="Car" />
                    
            <text-input
              id="car_title"
              ref="carTitle"
              v-model="car_title"
              type="text"          
              class="block w-full mt-1 "
              autocomplete="car_title"
            />
        
        </div>

        <div class="col-span-6 sm:col-span-4">
          <input-label for="name" value="Car Registration Number" />
                    
            <text-input
              id="car_reg"
              ref="carReg"
              v-model="car_reg"
              type="text"          
              class="block w-full mt-1 "
              autocomplete="car_reg"
            />
        
        </div>

        <div class="col-span-6 sm:col-span-4">
        <input-label for="date" value="Expiry Date" />
        <text-input
          id="exp_date"
          ref="dateInput"
          v-model="exp_date"
          type="date"
          class="block w-full mt-1"
        />

        <!-- <input-error :message="form.errors.date" class="mt-2" /> -->
      </div>
    
      </template>
  
      <template #actions>
      <div class="flex justify-between w-full">
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

        <submit-button
          
        >
          Next
        </submit-button>
      </div>
    </template>
    </form-section>
  </template>
    <script setup>
  import { ref, watch } from "vue";
  import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
  import FormSection from "@/Components/Shared/Form/FormSection.vue";
  import TextInput from "@/Components/Shared/Form/TextInput.vue";
  import TextArea from "@/Components/Shared/Form/TextArea.vue";
  import InputError from "@/Components/Shared/Form/InputError.vue";
  import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
  import { useStorage } from "@/Composables/useStorage";
  
  const car_title = useStorage("car_title", null);
  const car_insurance = useStorage("car_insurance", null);
  const zimra = useStorage("zimra", true);
  const car_reg = useStorage("car_reg", 1);
  const exp_date = useStorage("exp_date", null);

  
const emit = defineEmits(["next", "prev"]);

const addDetail = () => {
  emit("next");
};

const back = () => {
  emit("prev");
};
  
  </script>
    