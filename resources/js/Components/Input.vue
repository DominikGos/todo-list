<script setup>
const props = defineProps({
  type: String,
  validator(value) {
    return ['text', 'email', 'password'].includes(value)
  },
  modelValue: String,
})

defineEmits(['update:modelValue'])
</script>

<template>
  <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :type="props.type"
    class="w-full bg-gray-100 rounded-md focus:bg-white p-2">
</template>