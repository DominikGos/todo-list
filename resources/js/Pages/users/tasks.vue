<script setup>
import MainLayout from '../../Layouts/MainLayout.vue'
import PrimaryButton from '../../Components/PrimaryButton.vue';

defineOptions({layout: MainLayout})

const props = defineProps({tasks: Array})

</script>

<template>
  <div class="container mx-auto flex flex-col gap-5 p-3 mt-3">
    <header class="rounded-xl bg-white shadow-md p-3">
      <form class="flex flex-col gap-3">
        <h4 class="flex justify-between items-center">
          Type note
          <PrimaryButton :type="'submit'">
            Submit
          </PrimaryButton>
        </h4>
        <div> 
          <textarea rows="3" class="w-full bg-gray-100 rounded-md focus:bg-white"></textarea>
        </div>
      </form>
    </header>
  </div>
</template>
