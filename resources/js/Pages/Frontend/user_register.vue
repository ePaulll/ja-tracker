<template>
        <div class="flex items-center justify-center h-screen">
            <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
              <h1 class="text-2xl font-bold mb-6 text-center text-black">Register Account</h1>
              <form @submit.prevent="handleSubmit">
                <div class="form-control mb-4">
                    <label class="label">
                      <span class="text-black label-text font-bold">Name</span>
                    </label>
                    <input
                      type="text"
                      v-model="name"
                      placeholder="Enter your name"
                      class="input input-bordered w-full bg-neutral-content text-black placeholder-gray-800"
                      required
                    />
                  </div>
                  
            
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

                <div class="form-control mb-4">
                    <label class="label">
                      <span class="text-black label-text font-bold">Confirm Password</span>
                    </label>
                    <input
                      type="password"
                      v-model="confirmPassword"
                      placeholder="Confirm your password"
                      class="input input-bordered w-full bg-neutral-content text-black placeholder-gray-800"
                      required
                    />
                  </div>
        
         
                <button type="submit" class="btn bg-custom-powder-dark w-full text-black hover:bg-custom-powder-dark">Register</button>
              </form>
              
            </div>
          </div>

</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

// Set up form data
const name = ref('');
const email = ref('');
const password = ref('');
const confirmPassword = ref('');

// Function to handle form submission
const handleSubmit = async () => {
  try {
    axios.post(route('user_register.store'), {
        name: name.value,
        email: email.value,
        password: password.value,
        password_confirmation: confirmPassword.value,
    });
    alert('Registration successful!');
    window.location.href = '/';
} catch (error) {

    console.error(error.response.data); // Check detailed error messages
    alert('Registration failed. Please check your inputs.');

}
};
</script>

