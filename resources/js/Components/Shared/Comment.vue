<template>
  <div class="pt-5 bg-gradient-to-r from-sky-100 via-green-100 to-slate-100">
    <form
      @submit.prevent="submit"
      class="
        max-w-md
        mx-auto
        overflow-hidden
        bg-transparent
        shadow-md
       
        rounded-xl
        md:max-w-2xl
      "
    >
      <h1 class="p-5 font-semibold text-blue-700">
        Your Review on this Item is important to us
      </h1>

      <h1> </h1>

      <div
        id="input"
        class="
          flex flex-col
          w-full
          px-8
          my-5
          bg-transparent
         
        "
      >
        <label for="rating" class="mb-2 text-black">Rating</label>
        <fieldset>
          <div class="grid grid-cols-5">
            <div class="flex items-center">
              <input
                v-model="form.rating"
                value="1"
                id="push-everything"
                name="push-notifications"
                type="radio"
                class="
                  w-4
                  h-4
                  text-indigo-600
                  border-gray-300
                  focus:ring-indigo-500
                "
              />
              <label
                for="push-everything"
                class="block ml-3 text-sm font-medium text-black"
              >
                1
              </label>
            </div>
            <div class="flex items-center">
              <input
                v-model="form.rating"
                value="2"
                id="push-email"
                name="push-notifications"
                type="radio"
                class="
                  w-4
                  h-4
                  text-indigo-600
                  border-gray-300
                  focus:ring-indigo-500
                "
              />
              <label
                for="push-email"
                class="block ml-3 text-sm font-medium text-black"
                >2
              </label>
            </div>
            <div class="flex items-center">
              <input
                v-model="form.rating"
                value="3"
                id="push-nothing"
                name="push-notifications"
                type="radio"
                class="
                  w-4
                  h-4
                  text-indigo-600
                  border-gray-300
                  focus:ring-indigo-500
                "
              />
              <label
                for="push-nothing"
                class="block ml-3 text-sm font-medium text-black"
              >
                3</label
              >
            </div>
            <div class="flex items-center">
              <input
                v-model="form.rating"
                value="4"
                id="push-nothing"
                name="push-notifications"
                type="radio"
                class="
                  w-4
                  h-4
                  text-indigo-600
                  border-gray-300
                  focus:ring-indigo-500
                "
              />
              <label
                for="push-nothing"
                class="block ml-3 text-sm font-medium text-black"
              >
                4</label
              >
            </div>
            <div class="flex items-center">
              <input
                v-model="form.rating"
                value="5"
                id="push-nothing"
                name="push-notifications"
                type="radio"
                class="
                  w-4
                  h-4
                  text-indigo-600
                  border-gray-300
                  focus:ring-indigo-500
                "
              />
              <label
                for="push-nothing"
                class="block ml-3 text-sm font-medium text-black"
              >
                5</label
              >
            </div>
          </div>
        </fieldset>
      </div>
      <div id="input" class="flex flex-col w-full p-8 my-5">
        <label for="password" class="mb-2 text-black">Comment</label>
        <input
          v-model="form.comment"
          type="text"
          id="password"
          placeholder="Your Comment Comes Here"
          class="
            px-4
            py-3
            placeholder-gray-300
            border-2 border-gray-100
            rounded-lg
            appearance-none
           
            focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg
          "
        />
      </div>
      <div id="button" class="flex flex-col p-8 my-5 w-ful25">
        <button
          type="submit"
          class="p-8 py-4 text-green-100 bg-green-600 rounded-lg"
        >
          <div class="flex flex-row items-center justify-center">
            <div class="mr-2">
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                ></path>
              </svg>
            </div>
            <div class="font-bold text-white">Post Comment</div>
          </div>
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
  props: {
    product: Object,
    transport: Object,
    accommodation: Object,
    car: Object,
    service: Object,
    user: Object,
    route: Object,
  },
  setup(props) {
    const form = useForm({
      comment: null,
      rating: null,
      service_id: props.service.id,
      product_id: props.product.id,
      transport_id: props.transport.id,
      accommodation_id: props.accommodation.id,
      car_id: props.car.id,
      user_id: props.user.id,
      remember: true,
    });

    const picked = ref("One");

    function submit() {
      form.post(route(props.route));
    }

    return { form, submit };
  },
};
</script>