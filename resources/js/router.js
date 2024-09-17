import { createRouter, createWebHistory } from 'vue-router';
import Home from './Pages/Home.vue'; // Adjust paths as needed
import Register from './Pages/Register.vue';

const routes = [
  { path: '/', component: Home },
  { path: '/register', component: Register },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;