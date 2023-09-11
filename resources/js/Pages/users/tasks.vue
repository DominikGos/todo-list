<script setup>
import MainLayout from '../../Layouts/MainLayout.vue'
import PrimaryButton from '../../Components/PrimaryButton.vue';
import TextArea from '../../Components/TextArea.vue';
import SuccessButton from '../../Components/SuccessButton.vue'
import SecondaryButton from '../../Components/SecondaryButton.vue'
import FlashMessage from '../../Components/FlashMessage.vue'
import Task from '../../Components/Task.vue';
import InputError from '../../Components/InputError.vue'
import { router, useForm, usePage } from '@inertiajs/vue3';

defineOptions({ layout: MainLayout })

const props = defineProps({ tasks: Array })
const form = useForm({
  content: ''
})

const storeTask = () => {
  form.post(route('tasks.store'), {
    onSuccess: () => {
      form.reset('content')
    }
  })
}

</script>

<template>
  <div class="container mx-auto flex flex-col gap-5 p-3 mt-3">
    <FlashMessage class="mb-2" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</FlashMessage>
    <header class="rounded-xl bg-white shadow-md p-3">
      <form @submit.prevent="storeTask" class="flex flex-col gap-3">
        <h4 class="flex justify-between items-center">
          Type note
          <PrimaryButton :type="'submit'" :disabled="form.processing">
            Submit
          </PrimaryButton>
        </h4>
        <div>
          <TextArea v-model="form.content"></TextArea>
          <InputError :message="form.errors.content" />
        </div>
      </form>
    </header>
    <main class="rounded-xl  p-3">
      <nav class="flex gap-3">
        <SuccessButton>Active</SuccessButton>
        <SecondaryButton>Inactive</SecondaryButton>
      </nav>
      <div class="flex flex-col gap-4 mt-3">
        <h2 v-if="props.tasks.length <= 0">You have no any tasks.</h2>
        <Task v-else v-for="task in props.tasks" v-bind:key="task.id" :task="task" />
      </div>
    </main>
  </div>
</template>
