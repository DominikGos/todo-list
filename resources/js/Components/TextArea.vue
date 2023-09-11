<script setup>
const props = defineProps({
	rows: {
		type: Number,
		default: 3,
	},
	modelValue: String,
})

defineEmits(['update:modelValue'])
</script>

<template>
	<textarea :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :rows="props.rows"
		class="w-full bg-gray-100 rounded-md focus:bg-white"></textarea>
</template>
