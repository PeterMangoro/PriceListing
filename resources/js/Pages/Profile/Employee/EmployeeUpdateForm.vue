<template>
  <div>
    <div class="max-w-lg p-5 mx-auto bg-white rounded-lg shadow-sm">
      <p
        @click="$emit('close')"
        class="float-right m-auto hover:cursor-pointer text-red-600"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </p>
      <form @submit.prevent="submit">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-4">
            <InputLabel for="name" value="Name" />
            <text-input
              id="name"
              v-model="form.name"
              type="text"
              class="block w-full mt-1"
              required
              autofocus
              autocomplete="name"
            />
            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <div class="col-span-6 sm:col-span-3">
            <InputLabel for="position" value="Position" />
            <TextInput
              id="position"
              v-model="form.position"
              type="text"
              class="block w-full mt-1"
              required
              autofocus
              autocomplete="position"
            />
            <InputError class="mt-2" :message="form.errors.position" />
          </div>
        </div>

        <div>
          <label class="block mt-3 text-sm font-medium text-black">
            Upload Avatar
          </label>
          <div
            class="
              flex
              justify-center
              px-6
              pt-2
              pb-2
              mt-1
              border-2 border-gray-300 border-dashed
              rounded-md
            "
          >
            <div class="space-y-1 text-center">
              <div class="flex text-sm text-black">
                <label
                  for="file-upload"
                  class="
                    font-medium
                    text-indigo-600
                    bg-transparent bg-white
                    rounded-md
                    cursor-pointer
                    hover:text-indigo-500
                    focus-within:outline-none
                    focus-within:ring-2
                    focus-within:ring-offset-2
                    focus-within:ring-indigo-500
                  "
                >
                  <input
                    id="avatar"
                    @input="form.avatar = $event.target.files[0]"
                    type="file"
                    @change="onFileChange"
                  />
                </label>
              </div>
              <p class="text-xs text-black">PNG, JPG, GIF up to 2MB</p>

              <InputError class="mt-2" :message="form.errors.avatar" />
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end mt-4">
          <submit-button
            id="submit"
            class="ml-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Upload
          </submit-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";

const props = defineProps({
  path: String,
  employee: String,
});

const form = useForm({
  position: props.employee.position,
  avatar: null,
  name: props.employee.name,
  remember: true,
  _method: "PUT",
});

function submit() {
  form.post(route(props.path, props.employee.id));
}
</script>

<style>
</style>