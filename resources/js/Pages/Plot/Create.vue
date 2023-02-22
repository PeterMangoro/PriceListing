<template>
  <plot-layout title="Estate Create">
   
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
  <detail-form />
      </div>
</plot-layout>
</template>


<script setup>
import PlotLayout from "@/Layouts/PlotLayout.vue";
import formCard from "@/Components/Shared/Form/formCard.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";

import DetailForm from "@/Pages/Plot/Partials/Create/DetailForm.vue";


</script>
