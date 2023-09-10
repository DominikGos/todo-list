<script setup>
import { Link } from "@inertiajs/vue3";
import NavLink from "../Components/NavLink.vue";

</script>

<template>
  <nav class="w-full shadow-md bg-white">
    <div class="container px-3 flex justify-between flex-nowrap mx-auto">
      <div>
        <i class="fa-brands fa-laravel text-2xl p-3 text-cyan-400"></i>
      </div>
      <ul class="flex gap-2">                      
        <li class="h-full">
          <NavLink :active="route().current('users.get')">Profile</NavLink>
        </li>      
        <li class="h-full">
          <NavLink :href="route('users.tasks.index', {id: 1})" :active="route().current('users.tasks.index')">Tasks</NavLink>
        </li>      
        <li class="h-full">
          <NavLink :href="route('login.page')" :active="route().current('login.page')">Login</NavLink>
        </li>      
      </ul>
    </div>
  </nav>

  <main>
    <slot> </slot>
  </main>
</template>