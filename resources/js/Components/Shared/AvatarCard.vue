<template>
 
 
    <div
      class="py-3"
    
    >
    
      <img class="object-cover w-32 h-32 m-auto rounded-full " :src="employee.image" />
      <div class="w-48 h-20 p-2 mx-auto bg-white rounded-lg shadow-md overflow-clip line-clamp-3 " >
            <h3 class="mb-1 font-medium text-center">{{employee.name}}</h3>
            <p class="-my-1 font-medium text-center text-green-600">{{employee.position}}</p>
          </div>
    </div>
    
  

 

</template>
<script setup>

const props = defineProps({
  employee: Object,
});


</script>
