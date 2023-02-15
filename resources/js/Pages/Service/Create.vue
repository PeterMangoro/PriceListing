<template>
  <service-layout>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div v-if="step_one">
          <detail-form @next="go_to_step_two" />
        </div>

        <div v-if="step_two">
          <attachment-form
            @prev="go_to_step_one"
            :category_types="data.category_types"
          />
        </div>
      </div>
    </div>
  </service-layout>
</template>
  
  
  <script setup>
import ServiceLayout from "@/Layouts/ServiceLayout.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import DetailForm from "@/Pages/Service/Partials/Create/DetailForm.vue";
import AttachmentForm from "@/Pages/Service/Partials/Create/AttachmentForm.vue";

const props = defineProps({
  data: Object,
});

const step_one = ref(true);
const step_two = ref(false);

function go_to_step_one() {
  reset(), (step_one.value = true);
}

function go_to_step_two() {
  reset(), (step_two.value = true);
}

function reset() {
  (step_one.value = false), (step_two.value = false);
}
</script>
  