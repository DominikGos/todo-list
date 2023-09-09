<script setup>
const props = defineProps({
  type: String,
  validator(value) {
    return ['text', 'email', 'password'].includes(value)
  },
})
</script>

<template>
  <input :type="props.type" class="w-full bg-gray-100 rounded-md focus:bg-white p-2">
</template>