<template>
  <div>
    <div class="max-w-lg p-5 mx-auto ">
      <form @submit.prevent="submit" class="p-3 bg-white rounded-lg shadow-sm">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-4">
            <InputLabel for="account" value="Account" />
            <text-input
              id="account"
              v-model="form.account"
              type="text"
              class="block w-full mt-1"
              required
              autofocus
              autocomplete="account"
            />
            <InputError class="mt-2" :message="form.errors.account" />
          </div>

           <div class="col-span-6 sm:col-span-4">
            <InputLabel for="username" value="Username" />
            <TextInput
              id="username"
              v-model="form.username"
              type="text"
              class="block w-full mt-1"
              
              autofocus
              autocomplete="username"
            />
            <InputError class="mt-2" :message="form.errors.username" />
          </div>

          <div class="col-span-6 sm:col-span-4">
            <InputLabel for="handle" value="Handle/Number/Address" />
            <TextInput
              id="handle"
              v-model="form.handle"
              type="text"
              class="block w-full mt-1"
              required
              autofocus
              autocomplete="handle"
            />
            <InputError class="mt-2" :message="form.errors.handle" />
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
  handle: null,
  username: null,
  account: null,
  remember: true,
});

const emit = defineEmits(['close'])

function submit() {
  form.post(route(props.path),{
  onSuccess: () => {
     emit('close');
    },
  }
  );
}
</script>

<style>
</style>