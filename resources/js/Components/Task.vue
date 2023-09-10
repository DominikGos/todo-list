<script setup>
const props = defineProps({
  active: {
    type: Boolean,
    default: true,
  },
})

</script>

<template>
  <div class="flex justify-between items-center gap-2 p-3 bg-white rounded-full shadow-md">
    <p :class="[props.active ? '' : 'text-gray-400 line-through']">Something new to do</p>
    <button
      :class="[props.active ? 'bg-gray-300' : 'bg-green-500', 'rounded-full w-5 h-5 flex justify-center items-center hover:cursor-pointer']">
      <i v-if="!props.active" class="fa-solid fa-check text-white"></i>
    </button>
  </div>
</template>