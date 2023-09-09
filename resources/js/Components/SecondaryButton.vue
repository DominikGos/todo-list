<script setup>
const props = defineProps({
  type: {
    type: String,
    default: 'button'
  }
})
</script>

<template>
  <button :type="props.type" class="bg-gray-400 p-2 rounded-md text-white focus:ring-2 focus:ring-gray-400 hover:cursor-pointer hover:bg-gray-300 transition-all">
    <slot></slot>
  </button>
</template>