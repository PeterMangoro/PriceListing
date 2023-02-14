<template>
 <div v-if="show" class="mt-2">
     <employee-update-form :key = "componentKey" path="employees.update" :employee=selectedEmployee @close="notShow" />
    </div>
  <div class="flex flex-wrap justify-evenly">
    <div
      class="mt-2 bg-white rounded-lg shadow-md"
      v-for="employee in employees.data"
      :key="employee.id"
    >
      <div class="flex justify-center p-2">
         <button
          
          @click="showUpdateForm(employee) "
          class="w-full p-1 ml-2 text-white bg-blue-500 rounded hover:bg-blue-700 justify-items-center"
        >
          Edit
        </button>
        <button
          
          @click="confirmImageDeletion(employee.id)"
          class="w-full p-1 ml-2 text-white bg-red-500 rounded hover:bg-red-700 justify-items-center"
        >
          Delete
        </button>
      </div>
      <img class="object-cover w-32 h-32 m-auto rounded-full " :src="employee.image" />
      <div class="w-48 p-2 bg-gradient-white" style="backdrop-filter: blur(3px);">
            <h3 class="mx-auto mb-1 font-semibold">{{employee.name}}</h3>
            <p class="font-medium text-green-600">{{employee.position}}</p>
          </div>
    </div>
    
  </div>

  <JetConfirmationModal
    :show="confirmingImageDeletion"
    @close="confirmingImageDeletion = false"
  >
    <template #title> Delete Employee Record </template>

    <template #content>
      Are you sure you want to delete this employee record? Deleted records can not be recovered.
    </template>

    <template #footer>
      <JetSecondaryButton @click="confirmingImageDeletion = false">
        Cancel
      </JetSecondaryButton>

      <JetDangerButton
        class="ml-3"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        @click="deleteImage(employeeToBeDeleted)"
      >
        Delete Record
      </JetDangerButton>
    </template>
  </JetConfirmationModal>

  <div class="flex flex-wrap justify-center pb-1 ">
        <div v-if="employees.data.length" class="p-2 m-2 rounded-md">
          
          <Pagination :links="employees.links" />
        </div>

        <div v-else> 
<no-result-display />
        </div>
      </div>
</template>
<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import JetActionSection from "@/Components/ActionSection.vue";
import JetConfirmationModal from "@/Components/ConfirmationModal.vue";
import JetDangerButton from "@/Components/DangerButton.vue";
import JetSecondaryButton from "@/Components/SecondaryButton.vue";
import EmployeeInputForm from "@/Pages/Profile/Employee/EmployeeInputForm.vue";
import EmployeeUpdateForm from "@/Pages/Profile/Employee/EmployeeUpdateForm.vue";
import Pagination from "@/Components/Shared/Pagination.vue";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
const props = defineProps({
  employees: Object,
});

const confirmingImageDeletion = ref(false);
const employeeToBeDeleted = ref(null);


function confirmImageDeletion(employee) {
  confirmingImageDeletion.value = true;
  employeeToBeDeleted.value = employee;
}

function deleteImage(employee) {
  router.delete(route("employees.destroy", employee), {
    errorBag: "deleteImage",
    preserveScroll: true,
  });
  confirmingImageDeletion.value = false;
}

const selectedEmployee = ref(null)
const show = ref(false)
const componentKey = ref(0)

function notShow() {
  show.value=false
}
function forceRerender() {
  componentKey.value +=1
}

function showUpdateForm(employee) {
  forceRerender()
  show.value = true
  selectedEmployee.value = employee
}
</script>
