<script setup>
const props = defineProps({
  rows: {
    type: Number,
    default: 3,
  },
})
</script>

<template>
  <textarea :rows="props.rows" class="w-full bg-gray-100 rounded-md focus:bg-white"></textarea>
</template>