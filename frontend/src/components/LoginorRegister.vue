<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white shadow-lg p-8 rounded-lg w-full max-w-md">
      <div class="flex justify-around mb-4">
        <button @click="showLogin = true" class="font-bold" :class="{ 'text-blue-500': showLogin }">Login</button>
        <button @click="showLogin = false" class="font-bold" :class="{ 'text-blue-500': !showLogin }">Register</button>
      </div>
      <LoginForm v-if="showLogin" />
      <RegisterForm v-else />
    </div>
  </div>
</template>

<script>
import LoginForm from './LoginForm.vue'
import RegisterForm from './RegisterForm.vue'

export default {
  name: 'LoginOrRegister',
  components: { LoginForm, RegisterForm },
  data() {
    return {
      showLogin: true,
    }
  },
}
</script>
