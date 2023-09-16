<script setup>
import MainLayout from '../../Layouts/MainLayout.vue';
import Input from '../../Components/Input.vue';
import InputError from '../../Components/InputError.vue';
import InputLabel from '../../Components/InputLabel.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({ layout: MainLayout });

const form = useForm({
  name: '',
  email: '',
  password: ''
})
</script>

<template>
  <div class="container mx-auto mt-3 p-3">
    <form @submit.prevent="form.post(route('register'))" class="flex flex-col gap-3 p-3 bg-white rounded-xl shadow-md lg:w-96 mx-auto">
      <h3 class="text-xl mx-auto">Todo app</h3>
      <p class="text-sm text-gray-400">Register in the application</p>
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
      <div class="flex items-center gap-2">
        <p class="text-sm text-gray-400">Already have an account?</p>
        <Link :href="route('login.page')"><b class="text-cyan-400">Login</b></Link>
      </div>
    </form>
  </div>
</template>