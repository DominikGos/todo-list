<script setup>
import PrimaryButton from '../Components/PrimaryButton.vue';
import MainLayout from '../Layouts/MainLayout.vue'
import { Link } from '@inertiajs/vue3'

defineOptions({ layout: MainLayout })
</script>

<template>
  <div class="container mx-auto p-3 mt-3">
    <header>
      <h3 class="text-2xl font-medium text-center">
        Welcome to Your Todo List.
      </h3>
      <p class="text-gray-500 text-center font-medium">Organize Your Life, One Task at a Time</p>
    </header>
    <main class="mt-10">
      <div v-if="$page.props.auth.user" class="flex justify-center gap-3 items-center">
        <p class="text-xl">Create new task</p>
        <Link :href="route('users.tasks.index', { id: $page.props.auth.user.id })">
          <PrimaryButton>
            Create
          </PrimaryButton>
        </Link>
      </div>
      <div v-else class="flex justify-center gap-3 items-center">
        <p class="text-xl">Log into app</p>
        <Link :href="route('login.page')">
          <PrimaryButton> Login</PrimaryButton>
        </Link>
      </div>
    </main>
  </div>
</template>