<script setup>
import SuccessButton from '../SuccessButton.vue';
import SecondaryButton from '../SecondaryButton.vue';
import PrimaryButton from '../PrimaryButton.vue';
import Task from './Task.vue';
import { ref, watch } from 'vue'
const props = defineProps({ tasks: Array })
const emit = defineEmits(['showEditForm'])
const tasks = ref([])
tasks.value = props.tasks

watch(props, (newValue, oldValue) => {
  tasks.value = props.tasks
})

const setActiveTasks = () => {
  tasks.value = props.tasks.filter((task) => {
    return task.is_done == false
  })
}

const setInactiveTasks = () => {
  tasks.value = props.tasks.filter((task) => {
    return task.is_done == true
  })
}

const setAllTasks = () => {
  tasks.value = props.tasks
}
</script>

<template>
  <div class="p-3">
    <nav class="flex gap-3">
      <SuccessButton @click="setActiveTasks">Active</SuccessButton>
      <SecondaryButton @click="setInactiveTasks">Inactive</SecondaryButton>
      <PrimaryButton @click="setAllTasks">All</PrimaryButton>
    </nav>
    <div class="flex flex-col gap-4 mt-3">
      <h2 v-if="props.tasks.length <= 0">You have no any tasks.</h2>
      <Task v-else v-for="task in tasks" v-bind:key="task.id" :task="task" @click="$emit('showEditForm', task)"/>
    </div>
  </div>
</template>