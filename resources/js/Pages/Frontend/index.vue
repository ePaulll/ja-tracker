<template>
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
              v-model="form.email"
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
              v-model="form.password"
              placeholder="Enter your password"
              class="input input-bordered w-full bg-neutral-content text-black placeholder-gray-800"
              required
            />
            
          </div>
  
          <button
            type="submit"
            class="btn bg-custom-powder-dark w-full text-black hover:bg-custom-powder-dark"
            :disabled="form.processing"
          >
            <span v-if="form.processing" class="btn bg-custom-powder-dark w-full text-black hover:bg-custom-powder-dark">Logging in...</span>
            <span v-else>Login</span>
          </button>
          <span v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</span>
          <span v-if="form.errors.password" class="text-red-500 text-sm">{{ form.errors.password}}</span>
        </form>
  
        <div class="mt-4 text-center">
          <Link href="/user_register" class="text-custom-black hover:underline">
            Don't have an account? Register here
          </Link>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import { Link, useForm } from '@inertiajs/vue3';
  
//   const email = ref('');
//   const password = ref('');
  const form = useForm({
    email: '',
    password: ''
  });
  
  const handleSubmit = async () => {
    form.post(route('login_user'), {
      onSuccess: () => {
        window.location.href = '/user_dashboard';
      },
      onError: (errors) => {
        console.error(errors);
        // Here you can display form-specific errors
        // alert('Login failed, please check your credentials');
      }
    });
  };
  </script>
  

  