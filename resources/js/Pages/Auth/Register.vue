<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from "vue";

const form = useForm({
  name: "",
  username: "",
  password: "",
  password_confirmation: "",
  street:null,
  town:null,
  city:null,
  country:null,
  account:null,
  handle:null,
  terms: false,
});

const step_one = ref(true);
const step_two = ref(false);

function next() {
  (step_one.value = false), (step_two.value = true);
}

function prev() {
  (step_one.value = true), (step_two.value = false);
}

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
   <Head title="Register" />

<AuthenticationCard>
  <template #logo>
    <AuthenticationCardLogo />
  </template>

  <form @submit.prevent="submit">
    <div v-if="step_one">
      <div>
        <InputLabel for="name" value="Name" />
        <TextInput
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

      <div class="mt-4">
        <InputLabel for="username" value="Username" />
        <TextInput
          id="username"
          v-model="form.username"
          type="text"
          class="block w-full mt-1"
          required
        />
        <p class="text-sm text-green-500">
          This will be your login name, can be email or phone number
        </p>

        <InputError class="mt-2" :message="form.errors.username" />
      </div>

      <div class="mt-4">
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
            <p class="text-sm text-green-500">
          State the social media platform you want your clients to contact you at eg WhatsApp
        </p>
            <InputError class="mt-2" :message="form.errors.account" />
      </div>

      <div class="mt-4">
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
            <p class="text-sm text-green-500">
          Contact info for the platform above eg +263 784 352 080
        </p>
            <InputError class="mt-2" :message="form.errors.handle" />
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="Password" />
        <TextInput
          id="password"
          v-model="form.password"
          type="password"
          class="block w-full mt-1"
          required
          autocomplete="new-password"
        />
        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="Confirm Password" />
        <TextInput
          id="password_confirmation"
          v-model="form.password_confirmation"
          type="password"
          class="block w-full mt-1"
          required
          autocomplete="new-password"
        />
        <InputError
          class="mt-2"
          :message="form.errors.password_confirmation"
        />
      </div>
    </div>

<div v-if="step_two">
        <div class="col-span-6 sm:col-span-3">
              <InputLabel for="street" value="Address" />
              <TextInput
                id="street"
                v-model="form.street"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="street"
              />
              <InputError class="mt-2" :message="form.errors.street" />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <InputLabel for="town" value="Town" />
              <TextInput
                id="town"
                v-model="form.town"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="town"
              />
              <InputError class="mt-2" :message="form.errors.town" />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <InputLabel for="city" value="City" />
              <TextInput
                id="city"
                v-model="form.city"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="city"
              />
              <InputError class="mt-2" :message="form.errors.city" />
            </div>
            
            <div class="col-span-6 sm:col-span-3">
              <InputLabel for="country" value="Country" />
              <TextInput
                id="country"
                v-model="form.country"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="country"
              />
              <InputError class="mt-2" :message="form.errors.country" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <InputError class="mt-2" :message="form.errors.name" />
              <InputError class="mt-2" :message="form.errors.username" />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>
            

<div
      v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
      class="mt-4"
    >
      <InputLabel for="terms">
        <div class="flex items-center">
          <Checkbox
            id="terms"
            v-model:checked="form.terms"
            name="terms"
            required
          />

          <div class="ml-2">
            I agree to the
            <a
              target="_blank"
              :href="route('terms.show')"
              class="text-sm text-gray-600 underline hover:text-gray-900"
              >Terms of Service</a
            >
            and
            <a
              target="_blank"
              :href="route('policy.show')"
              class="text-sm text-gray-600 underline hover:text-gray-900"
              >Privacy Policy</a
            >
          </div>
        </div>
        <InputError class="mt-2" :message="form.errors.terms" />
      </InputLabel>
    </div>
</div>
   

    <div class="flex items-center justify-end gap-4 mt-4">
      <Link
        :href="route('login')"
        class="text-sm text-gray-600 underline hover:text-gray-900"
      >
        Already registered?
      </Link>

<span v-if="step_one">
   <button
            @click="next"
              id="submit"
              class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-green-600 border border-transparent rounded-md hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Next
            </button>
</span>
<span v-if="step_two">
   <button
            @click="prev"
              id="submit"
              class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-black uppercase transition bg-gray-300 border border-transparent rounded-md hover:bg-red-700 active:bg-gray-900 focus:outline-none hover:text-white focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Back
            </button>
  <PrimaryButton
        class="ml-4"
        id="Register"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Register
      </PrimaryButton>
</span>
      
    </div>
  </form>
</AuthenticationCard>
</template>
