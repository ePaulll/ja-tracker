<template>
  <div class="pt-4">
    <div class="navbar w-96 rounded-2xl bg-custom-powder-dark mx-auto">
      <div class="flex-1">
        <a class="btn btn-ghost text-xl text-black">Job Application Tracker</a>
      </div>
      <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
          <li>
            <details>
              <summary class="text-black">{{ user.name }}</summary>
              <ul class="bg-custom-powder-dark text-black">
                <li><a @click.prevent="handleLogout">Logout</a></li>
              </ul>
            </details>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/vue3'; 
// nag e error pag inuncomment tong nasa taas, bukas nalang inaantok na ko

// Define the props the component will accept
const props = defineProps({
  user: Object
});

// Logout function
const handleLogout = () => {
  Inertia.post('/logout'); // Adjust the route if necessary
};
</script>

<style>
.navbar {
  width: 80%; 
  margin: 0 auto;
}
</style>
