<script setup>
import { onMounted, ref } from 'vue';
import Modal from '../Modal.vue';
import TextArea from '../TextArea.vue';
import InputError from '../InputError.vue';
import InputLabel from '../InputLabel.vue'
import PrimaryButton from '../PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import DangerButton from '../DangerButton.vue';

const taskIsActive = ref(false)
const task = ref({})
let form = useForm({
  content: task.value.content,
  is_done: task.value.is_done
})

const destroyTask = () => {
  form.delete(route('tasks.destroy', { id: task.value.id }), {
    onSuccess: () => {
      taskIsActive.value = false
    }
  })
}

const editTask = () => {
  form.put(route('tasks.update', { id: task.value.id }), {
    onSuccess: () => {
      taskIsActive.value = false
    }
  })
}

const showTask = (taskObject) => {
  task.value = taskObject
  form = { ...form, ...task.value }
  taskIsActive.value = true
}

const hideTask = () => {
  task.value = {}
  form = { ...form, ...task.value }
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
        <p>
          Your task is
          <span v-if="form.is_done" class="text-gray-500">inactive</span>
          <span v-else class="text-green-500">active</span>
        </p>
        <PrimaryButton :type="'submit'" :disabled="form.processing">
          Edit
        </PrimaryButton>
      </h4>
      <div>
        <TextArea :value="form.content" v-model="form.content"></TextArea>
        <InputError :message="form.errors.content" />
      </div>
      <div class="flex justify-between items-center">
        <div class="flex gap-2">
          <InputLabel>Set as done</InputLabel>
          <input type="checkbox" v-model="form.is_done" :checked="form.is_done">
        </div>
        <div>
          <DangerButton @click="destroyTask">
            Delete
          </DangerButton>
        </div>
      </div>
      <p class="text-sm">
        {{ task.created_at }}
      </p>
    </form>
  </Modal>
</template>