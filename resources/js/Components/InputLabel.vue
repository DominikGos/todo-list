<script setup>
defineProps({
  value: {
    type: String,
  },
});
</script>

<template>
  <label class="block">
    <span v-if="value">{{ value }}</span>
    <span v-else>
      <slot></slot>
    </span>
  </label>
</template>