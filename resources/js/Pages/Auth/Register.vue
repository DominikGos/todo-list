<script setup>
import MainLayout from '../../Layouts/MainLayout.vue';
import Input from '../../Components/Input.vue';
import InputError from '../../Components/InputError.vue';
import InputLabel from '../../Components/InputLabel.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

defineOptions({ layout: MainLayout });

const form = useForm({
  name: '',
  email: '',
  password: ''
})
</script>

<template>
  <div class="container mx-auto mt-3 p-3">
    <form @submit.prevent="form.post(route('register'))" class="flex flex-col gap-3 p-3 bg-white rounded-xl shadow-md">
      <h3 class="text-xl mx-auto">Todo app</h3>
      <div>
        <InputLabel :value="'Name'" />
        <Input v-model="form.name"/>
        <InputError :message="form.errors.name"/>
      </div>
      <div>
        <InputLabel :value="'E-mail'" />
        <Input v-model="form.email" :type="'email'" />
        <InputError :message="form.errors.email"/>
      </div>
      <div>
        <InputLabel :value="'Password'" />
        <Input v-model="form.password" :type="'password'" />
        <InputError :message="form.errors.password"/>
      </div>
      <div>
        <PrimaryButton :type="'submit'">Register</PrimaryButton>
      </div>
    </form>
  </div>
</template>