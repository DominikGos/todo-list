<script setup>
import { Link } from "@inertiajs/vue3";
import NavLink from "../Components/NavLink.vue";
import LogoutForm from '../Components/LogoutForm.vue'
</script>

<template>
  <nav class="w-full shadow-md bg-white">
    <div class="container px-3 flex justify-between flex-nowrap mx-auto">
      <div>
        <i class="fa-brands fa-laravel text-2xl p-3 text-cyan-400"></i>
      </div>
      <ul class="flex gap-2">
        <li class="h-full">
          <NavLink :href="route('home')" :active="route().current('home')">Home</NavLink>
        </li>
        <li v-if="$page.props.auth.user" class="h-full">
          <NavLink :href="route('users.tasks.index', { id: $page.props.auth.user })" :active="route().current('users.tasks.index')">Tasks
          </NavLink>
        </li>
        <li v-if="!$page.props.auth.user" class="h-full">
          <NavLink :href="route('register.page')" :active="route().current('register.page')">Register</NavLink>
        </li>
        <li v-if="!$page.props.auth.user" class="h-full">
          <NavLink :href="route('login.page')" :active="route().current('login.page')">Login</NavLink>
        </li>
        <li v-if="$page.props.auth.user" class="h-full flex items-center">
          <LogoutForm/>
        </li>
      </ul>
    </div>
  </nav>

  <main>
    <slot> </slot>
  </main>
</template>