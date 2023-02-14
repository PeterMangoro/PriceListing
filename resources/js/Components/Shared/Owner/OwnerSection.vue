<template>
  <div>
        <p class="slate-50">{{heading}}</p>

        <span
          class="text-lg font-medium text-slate-100 underline hover:text-sky-400 hover:font-bold hover:duration-200"
        >
          <Link :href="route('company_profile.show', username)">
            {{ owner }}
          </Link>
        </span>

        <div class="pt-5">
          <owner-contacts :socials="contacts" />
        </div>

        <document-list
          v-if="documents"
          :documents="documents"
          path="attachments.show"
        />
      </div>
</template>

<script setup>
import OwnerContacts from "@/Components/Shared/Owner/OwnerContacts.vue";
import DocumentList from "@/Components/Shared/DocumentList.vue";
const props = defineProps({
    heading:String,
    username:String,
    owner:String,
    contacts:Object,
    documents:Object,
})
</script>

<style>

</style>