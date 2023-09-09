<script setup>
const props = defineProps({
  type: {
    type: String,
    default: 'button'
  }
})
</script>

<template>
  <button :type="props.type" class="bg-cyan-400 p-2 rounded-md text-white focus:ring-2 focus:ring-cyan-400 hover:cursor-pointer hover:bg-cyan-300 transition-all">
    <slot></slot>
  </button>
</template>