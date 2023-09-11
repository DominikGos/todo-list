<script setup>
import { useForm } from '@inertiajs/vue3';
import PrimaryButon from '../Components/PrimaryButton.vue'

const form = useForm({})
</script>

<template>
  <form @submit.prevent="form.post(route('logout'))">
    <PrimaryButon :type="'submit'">Logout</PrimaryButon>
  </form>
</template>