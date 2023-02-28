<template>
  <div class="flex flex-col items-center pt-6 sm:justify-center sm:pt-0">
    <div
      class="w-full px-6 py-4 mt-6 overflow-hidden bg-white rounded-lg shadow-md sm:max-w-md"
    >
      <form class="flex flex-col items-center sm:justify-center">
        <form @submit.prevent="submit">
          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
              <input-label for="name" value="Name" />
              <text-input
                id="name"
                v-model="form.name"
                type="text"
                min="1"
                max="10"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="name"
              />
              <input-error class="mt-2" :message="form.errors.rating" />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <input-label for="rating" value="Rating Score out of 10" />
              <text-input
                id="rating"
                v-model="form.rating"
                type="number"
                min="1"
                max="10"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="rating"
              />
              <input-error class="mt-2" :message="form.errors.rating" />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <input-label for="comment" value="Comment" />
              <text-area
                id="comment"
                v-model="form.comment"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="detail"
              />
              <input-error class="mt-2" :message="form.errors.comment" />
            </div>
          </div>

          <div class="flex items-center justify-end mt-4">
            <submit-button
              id="submit"
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Post
            </submit-button>
          </div>
        </form>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import BreadCrumb from "@/Components/Shared/BreadCrumb.vue";
import formCard from "@/Components/Shared/Form/formCard.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import { usePage } from '@inertiajs/vue3'

const props = defineProps({
  id: Number,
  path: String,
});

const form = useForm({
  product_id: props.id,
  // name: null || usePage().props.user.name ,
  name: usePage().props.user ? usePage().props.user.name : null,
  rating: null,
  comment: null,
  remember: true,
});

const emit = defineEmits(['close'])

function submit() {
  form.post(route(props.path), {
    preserveScroll: true,
    onSuccess: emit('close')
  });
}
</script>