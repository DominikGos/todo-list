<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
  href: {
    type: String,
    required: true,
  },
  active: {
    type: Boolean,
  },
});

const classes = computed(() => {
  let classes = 'h-full flex items-center px-2'

  if(props.active)
    classes = `${classes} border-b-2 border-cyan-400`
  else
    classes = `${classes} text-gray-500 border-b-2 border-transparent` 

  return classes
})

</script>

<template>
  <Link :href="props.href" :class="classes">
  <slot></slot>
  </link>
</template>