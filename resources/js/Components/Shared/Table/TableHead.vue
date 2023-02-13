<template>
  <th class="px-4 py-3">
     <span class="flex justify-between gap-1 ">
      <slot />
      
      <bars-arrow-down-icon v-if="$page.props.data.filters.direction=='desc' && $page.props.data.filters.column==name " class="w-4 h-4 m-auto"/>
      
      <bars-arrow-up-icon v-if="$page.props.data.filters.direction=='asc' && $page.props.data.filters.column==name " class="w-4 h-4 my-auto"/>
    </span>
                      
  </th>
</template>
<script setup>
import {BarsArrowDownIcon,BarsArrowUpIcon} from "@heroicons/vue/24/outline"

const props = defineProps({
  name:String
})
</script>