<template>
  <app-layout>
    <template #header>
     
        <h2 class="text-xl font-semibold leading-tight text-start text-sky-500">
          Social Dashboard
        </h2>

        <div class="text-end">
          <submit-button @click="showForm = !showForm" >
          <span v-if="showForm"> Close </span>
          <span v-else> Add Social Account </span>
        </submit-button>
        </div>
        
     
    </template>
    <!-- <bread-crumb :routes="routes" /> -->
    <div v-if="showForm">
      <social-input-form path="socials.store" social="add" @close="closeForm" />
    </div>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <search-table
        class="pb-2"
        route-name="socials.index"
        placeholder="Search socials..."
        show_per_page="true"
      />
      <Table heading="Social Table" :pagination="data.socials.links">
        <template #tableHead>
          <TableHead class="cursor-pointer" @click="sort('title')" name="title"
            >Account</TableHead
          >
          <TableHead
            class="cursor-pointer"
            @click="sort('username')"
            name="username"
            >Username</TableHead
          >
          <TableHead>Handle</TableHead>

          <TableHead class="text-center"></TableHead>
        </template>
        <TableRow v-for="social in data.socials.data" :key="social.id">
          <TableData v-if="edit && social.id == SocialId">
            <text-input
              id="account"
              v-model="form.account"
              type="text"
              class="block mt-1"
              required
              autocomplete="account"
            />
            <InputError class="mt-2" :message="form.errors.account" />
          </TableData>
          <TableData v-else @click="showEditForm(social)">{{
            social.account
          }}</TableData>
          <TableData v-if="edit && social.id == SocialId">
            <text-input
              id="username"
              v-model="form.username"
              type="text"
              class="block mt-1"
              required
              autocomplete="username"
            />
            <InputError class="mt-2" :message="form.errors.username" />
          </TableData>
          <TableData v-else @click="showEditForm(social)">{{
            social.username
          }}</TableData>

          <TableData v-if="edit && social.id == SocialId">
            <text-input
              id="handle"
              v-model="form.handle"
              type="text"
              class="block mt-1"
              required
              autocomplete="handle"
            />
            <InputError class="mt-2" :message="form.errors.handle" />
          </TableData>
          <TableData v-else @click="showEditForm(social)">{{
            social.handle
          }}</TableData>
          <TableData>
            <div class="flex space-x-1">
              <!-- <ButtonLink
                class="bg-blue-500 hover:bg-blue-700"
                :link="route('socials.edit', social.id)"
                >View</ButtonLink
              > -->
              <Button
                class="
                  inline-flex
                  justify-center
                  px-4
                  py-2
                  text-sm
                  font-medium
                  text-white
                  bg-blue-600
                  border border-transparent
                  rounded-md
                  shadow-sm
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-blue-500
                "
                v-if="edit && social.id == SocialId"
                @click="submit(social.id)"
              >
                Update
              </Button>
              <div v-else class="flex">
                <div
                  v-if="hasActions && social.id == SocialId"
                  class="
                    flex
                    items-center
                    justify-end
                    px-4
                    py-3
                    text-right text-slate-500
                    sm:px-6 sm:rounded-bl-md sm:rounded-br-md
                  "
                >
                  Saved !!
                </div>
                <Button
                  class="
                    inline-flex
                    justify-center
                    px-4
                    py-2
                    text-sm
                    font-medium
                    text-white
                    bg-red-600
                    border border-transparent
                    rounded-md
                    shadow-sm
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-red-500
                  "
                  @click="show_delete_confirmation(social.id)"
                  as="button"
                  type="button"
                  >Suspend</Button
                >
              </div>
            </div>
          </TableData>
        </TableRow>
      </Table>
      <!-- table End -->
    </div>

    <div v-if="show">
      <delete-confirmation
        :message="message"
        path="socials.destroy"
        :item="social_to_be_deleted"
        @close="show = false"
      />
    </div>
  </app-layout>
</template>

<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
// import BreadCrumb from "@/Components/Shared/breadCrumb.vue";
import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import JetInput from "@/Components/TextInput.vue";
import DeleteConfirmation from "@/Components/Shared/DeleteConfirmation.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import Location from "@/Components/Shared/Location.vue";
import { useSort } from "@/Composables/sort.js";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import { useForm,router } from "@inertiajs/vue3";
import SocialInputForm from "@/Pages/Profile/Social/SocialInputForm.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
const showForm = ref(false);

const props = defineProps({
  data: Object,
});
const message =
  "Are you sure you want to delete this social. Deleted socials will not be seen by customers, but can be found in the trash if you want to restore them";

const show = ref(false);
const social_to_be_deleted = ref(null);

function show_delete_confirmation(social) {
  show.value = true;
  social_to_be_deleted.value = social;
}

function closeForm() {
  showForm.value=false
}

function sort(column) {
  useSort(column, "socials.index");
}

//Editing
const edit = ref(false);
const SocialUsername = ref(null);
const SocialAccount = ref(null);
const SocialHandle = ref(null);
const SocialId = ref(null);

function showEditForm($account) {
  edit.value = true;
  SocialAccount.value = $account.account;
  SocialUsername.value = $account.username;
  SocialHandle.value = $account.handle;
  SocialId.value = $account.id;
}
const form = useForm({
  handle: SocialHandle,
  username: SocialUsername,
  account: SocialAccount,
  remember: true,
});

const hasActions = ref(false);

// function successMessage() {

//   return 'Saved Successfully'
// }

function submit(id) {
  form.put(route("socials.update", id), {
    preserveScroll: true,
    onSuccess: () => {
      edit.value = false;
      hasActions.value = true;
    },
  });
}
</script>
