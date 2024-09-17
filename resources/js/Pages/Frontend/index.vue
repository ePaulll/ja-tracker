<template>
    <!-- <Header/> -->
    <div class="flex items-center justify-center h-screen">
      <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-black">Login</h1>
        <form @submit.prevent="handleSubmit">
      
          <div class="form-control mb-4">
            <label class="label">
              <span class="text-black label-text font-bold">Email</span>
            </label>
            <input
              type="email"
              v-model="email"
              placeholder="Enter your email"
              class="input input-bordered w-full bg-neutral-content text-black placeholder-gray-800"
              required
            />
          </div>
          
    
          <div class="form-control mb-4">
            <label class="label">
              <span class="text-black label-text font-bold">Password</span>
            </label>
            <input
              type="password"
              v-model="password"
              placeholder="Enter your password"
              class="input input-bordered w-full bg-neutral-content text-black placeholder-gray-800"
              required
            />
          </div>
  
   
          <button type="submit" class="btn bg-custom-powder-dark w-full text-black hover:bg-custom-powder-dark">Login</button>
        </form>

        <div class="mt-4 text-center">
            <Link href="/user_register" class="text-custom-black hover:underline">
                Don't have an account? Register here
              </Link>
          </div>

      </div>
    </div>

  </template>
  
  <script setup>//   import Header from '@/Components/Header.vue'

  import { ref } from 'vue';
  import axios from 'axios';
  import { Link } from '@inertiajs/vue3';
  
  // Define reactive variables for email and password
  const email = ref('');
  const password = ref('');
  
  // Handle form submission
  const handleSubmit = async () => {
    try {
    await axios.post(route('login_user'), {
        email: email.value,
        password: password.value,
      
    });
    // alert('Registration successful!');
    window.location.href = '/user_dashboard';
} catch (error) {

    console.error(error.response.data); // Check detailed error messages
    alert('Login failed, Please check your inputs.');

}
  };
  </script>
  