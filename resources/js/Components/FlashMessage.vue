<script setup>
import { ref } from 'vue';

const showMessage = ref(true)
const messageExpirationTime = 5000

setTimeout(() => {
  showMessage.value = false
}, messageExpirationTime)
</script>

<template>
  <div v-if="showMessage" class="bg-emerald-400 p-3 rounded-md text-white">
    <slot></slot>
  </div>
</template>