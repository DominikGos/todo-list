<script setup>
import MainLayout from '../../Layouts/MainLayout.vue'
import PrimaryButton from '../../Components/PrimaryButton.vue';
import TextArea from '../../Components/TextArea.vue';
import SuccessButton from '../../Components/SuccessButton.vue'
import SecondaryButton from '../../Components/SecondaryButton.vue'
import Task from '../../Components/Task.vue';

defineOptions({ layout: MainLayout })

const props = defineProps({ tasks: Array })

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
          <TextArea></TextArea>
        </div>
      </form>
    </header>
    <main class="rounded-xl  p-3">
      <nav class="flex gap-3">
        <SuccessButton>Active</SuccessButton>
        <SecondaryButton>Inactive</SecondaryButton>
      </nav>
      <div class="flex flex-col gap-4 mt-3">
        <Task/>
        <Task :active="false" />
      </div>
    </main>
  </div>
</template>
