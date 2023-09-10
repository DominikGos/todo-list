<script setup>
import MainLayout from '../../Layouts/MainLayout.vue';
import Input from '../../Components/Input.vue';
import InputError from '../../Components/InputError.vue';
import InputLabel from '../../Components/InputLabel.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({ layout: MainLayout });

const form = useForm({
  email: '',
  password: ''
})
</script>

<template>
  <div class="container mx-auto mt-3 p-3">
    <form @submit.prevent="form.post(route('login'))" class="flex flex-col gap-3 p-3 bg-white rounded-xl shadow-md">
      <h3 class="text-xl mx-auto">Todo app</h3>
      <p class="text-sm text-gray-400">Log into the app</p>
      <div>
        <InputLabel :value="'E-mail'" />
        <Input v-model="form.email" :type="'email'" />
        <InputError :message="form.errors.email" />
      </div>
      <div>
        <InputLabel :value="'Password'" />
        <Input v-model="form.password" :type="'password'" />
        <InputError :message="form.errors.password" />
      </div>
      <div>
        <PrimaryButton :type="'submit'">Login</PrimaryButton>
      </div>
      <div class="flex items-center gap-2">
        <p class="text-sm text-gray-400">You dont have an account yet?</p>
        <Link :href="route('register.page')"><b class="text-cyan-400">Register</b></Link>
      </div>
    </form>
  </div>
</template>