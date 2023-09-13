<script setup>
import { onMounted, ref } from 'vue';
import Modal from '../Modal.vue';
import TextArea from '../TextArea.vue';
import InputError from '../InputError.vue';
import InputLabel from '../InputLabel.vue'
import PrimaryButton from '../PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

const taskIsActive = ref(false)
const task = ref({})
const form = useForm({
  content: task.value.content
})

const editTask = () => {
  form.put(route('tasks.update', {'id': task.value.id}), {
    onSuccess: () => {
      taskIsActive.value = false
    }
  })
}

const showTask = (taskObject) => {
  task.value = taskObject
  form.content = task.value.content
  taskIsActive.value = true
}

const hideTask = () => {
  task.value = {}
  form.content = task.value.content
  taskIsActive.value = false
}

defineExpose({
  showTask
})
</script>

<template>
  <Modal ref="editForm" :active="taskIsActive" @closeModal="hideTask">
    <form @submit.prevent="editTask" class="flex flex-col gap-3 mt-2">
      <h4 class="flex justify-between items-center">
        Yout note
        <PrimaryButton :type="'submit'" :disabled="form.processing">
          Edit
        </PrimaryButton>
      </h4>
      <div>
        <TextArea :value="form.content" v-model="form.content"></TextArea>
        <InputError :message="form.errors.content" />
      </div>
      <p class="text-sm">
        {{ task.created_at }}
      </p>
    </form>
  </Modal>
</template>