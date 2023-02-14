<template>
  <AppLayout title="Profile">
    <template #header>
      <div class="flex flex-wrap justify-between max-w-3xl mx-auto">
        <h2 class="text-xl font-semibold leading-tight text-gray-100">
          Profile
        </h2>

        <submit-button @click="showForm = !showForm">
          <span v-if="showForm"> Close </span>
          <span v-else> Add Employee </span>
        </submit-button>
      </div>
    </template>

    <div v-if="showForm" class="mt-2">
      <employee-input-form path="employees.store" employee="add" />
    </div>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <!-- <UpdateCompanyProfileInformationForm :profile="$page.props.profile" /> -->
          <edit-avatar-card class="mt-2" :employees="data.employees" />

          <JetSectionBorder />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetSectionBorder from "@/Components/SectionBorder.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import EditAvatarCard from "@/Components/Shared/EditAvatarCard.vue";

import { ref } from "vue";
import EmployeeInputForm from "@/Pages/Profile/Employee/EmployeeInputForm.vue";

const showForm = ref(false);
defineProps({
  data: Object,
});
</script>
 