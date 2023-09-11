<script setup>
const props = defineProps({
  task: {
    type: Object,
    required: true,
  }
})

</script>

<template>
  <div class="flex justify-between items-center gap-2 p-3 bg-white rounded-full shadow-md">
    <p :class="[props.task.is_done ? 'text-gray-400 line-through' : 'truncate w-5/6']">{{ props.task.content }}</p>
    <button
      :class="[props.task.is_done ? 'bg-green-500' : 'bg-gray-300', 'rounded-full w-5 h-5 flex justify-center items-center hover:cursor-pointer']">
      <i v-if="props.task.is_done" class="fa-solid fa-check text-white"></i>
    </button>
  </div>
</template>