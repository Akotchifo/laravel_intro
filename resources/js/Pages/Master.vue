<script setup>
import { usePage } from '@inertiajs/vue3'; // Utilisation de Inertia pour récupérer les props
import { defineProps, defineEmits } from 'vue';

const { user, canCreateArticle, messages } = usePage().props; // Récupère les props passées via Inertia

const logout = () => {
    Inertia.post(route('logout')); 
};

</script>


<template>

<div>
    <header>
      <h1>Laravel 101</h1>
      <nav>
        <a href="/articles">Articles</a>
        <a href="/about-us">About Us</a>
        <a href="/contact-us">Contact Us</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
      </nav>
    </header>
    
    <!-- Ici, le contenu de la page sera injecté -->
    <main>
      <slot></slot>
    </main>

    <footer>
      <p>&copy; 2024 Laravel App</p>
    </footer>
  </div>
</template>


<style scoped></style>