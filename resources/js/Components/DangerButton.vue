<script setup>
const props = defineProps({
  type: {
    type: String,
    default: 'button'
  }
})
</script>

<template>
  <button :type="props.type" class="bg-red-400 p-2 rounded-md text-white focus:ring-2 focus:ring-red-400 hover:cursor-pointer hover:bg-red-300 transition-all">
    <slot></slot>
  </button>
</template>