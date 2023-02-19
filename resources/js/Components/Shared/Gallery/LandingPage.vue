<template>
    <div v-if="images.length">
      <div class="flex flex-col items-center">
        <transition-group
          class="flex items-center overflow-hidden "
          tag="div"
        >
          <div>
            <div class=" rounded-lg ">
              <img
              :key="image.id"
                :src="image"
                :alt="image"
                class="object-cover object-center rounded  w-screen h-96 group-hover:opacity-75 transition delay-700 duration-300 "
              />
            </div>
          </div>
        </transition-group>
        <div class="w-full ">
          <div class="flex">
            <div
              class="flex justify-start gap-2 m-auto mt-2 overflow-x-auto rounded-lg "
            >
              <p
                v-for="(image, index) in images"
                :key="index.id"               
                class=" bg-white opacity-70 w-2 h-2 rounded  hover:cursor-pointer"
               
                @click="selectedImage(image.path)"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  const props = defineProps({
    images: Object,
  });
  
  const image = ref(props.images[0].path);
  
  function selectedImage(path) {
    image.value = path;
  }

  setInterval(getPath, 1000 * 3);

function getPath() {
  // console.log(random_item(props.images).path);
    

   image.value=random_item(props.images).path

 
}
function random_item(images)
{
  
return images[Math.floor(Math.random()*images.length)];
     
}
  </script>
  
  