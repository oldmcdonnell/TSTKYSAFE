<template>
    <div class="login">
      <h2>Login</h2>
      <form @submit.prevent="login">
        <input v-model="pseudonym" placeholder="Enter pseudonym" />
        <button type="submit">Login</button>
      </form>
    </div>
  </template>
  
  <script>
  import { login } from '../utils/loginHelper'; // adjust path if needed
  
  export default {
    data() {
      return {
        pseudonym: ''
      };
    },
    methods: {
      login() {
        login(this.pseudonym, this.$router);
      }
    }
  };
  </script>
  
  <style scoped>
  /* Your CSS here */
  </style>
  