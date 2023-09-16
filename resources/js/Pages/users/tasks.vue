<script setup>
import MainLayout from '../../Layouts/MainLayout.vue'
import PrimaryButton from '../../Components/PrimaryButton.vue';
import TextArea from '../../Components/TextArea.vue';
import FlashMessage from '../../Components/FlashMessage.vue'
import InputError from '../../Components/InputError.vue'
import EditForm from '../../Components/Task/EditForm.vue';
import TaskList from '../../Components/Task/TaskList.vue'
import { ref, onMounted } from 'vue'
import { useForm } from '@inertiajs/vue3';

defineOptions({ layout: MainLayout })

const props = defineProps({ tasks: Array })
const editForm = ref(null)
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
  <div class="container mx-auto flex flex-col lg:flex-row lg:justify-center gap-5 p-3 mt-3">
    <EditForm ref="editForm"/>
    <div class="flex flex-col gap-5 lg:w-4/12">
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
            <InputError :message="form.errors.content"/>
          </div>
        </form>
      </header>
    </div>
    <TaskList :tasks="props.tasks" v-if="editForm" @showEditForm="editForm.showTask" class="lg:w-6/12"/>
  </div>
</template>
