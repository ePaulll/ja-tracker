<template>
    <div>
      <Header :user="user" /> <!-- Pass the user data as a prop -->
      <div class="pt-4">
        <!-- Other content for the user dashboard -->
      </div>
    </div>
  </template>
  
  <script setup>
  import Header from '@/Components/Header.vue';
  import { usePage } from '@inertiajs/vue3';
  
  // Access the user data passed by Inertia
  const { props } = usePage();
  const user = props.user;
  </script>
  
  <style>
  /* Your styles here */
  </style>
  