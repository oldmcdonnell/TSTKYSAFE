<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Login</h2>
    <form @submit.prevent="login">
      <div class="mb-4">
        <label class="block text-gray-700">Email</label>
        <input v-model="form.email" type="email" class="w-full border px-3 py-2 rounded" required />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Password</label>
        <input v-model="form.password" type="password" class="w-full border px-3 py-2 rounded" required />
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        Login
      </button>

      <p v-if="error" class="mt-4 text-red-500">{{ error }}</p>
      <p v-if="success" class="mt-4 text-green-500">✅ Login successful!</p>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: '',
        password: ''
      },
      error: null,
      success: false
    };
  },
  methods: {
    async login() {
      this.error = null;
      this.success = false;

      try {
        const response = await fetch('http://127.0.0.1:8000/api/login', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(this.form),
          credentials: 'include' // needed if using Sanctum
        });

        if (!response.ok) {
          const err = await response.json();
          this.error = err.message || 'Login failed';
          return;
        }

        this.success = true;
        const data = await response.json();
        console.log("✅ Logged in user:", data);

        // Optionally store token or set session
        // localStorage.setItem('token', data.token);
      } catch (err) {
        this.error = 'Something went wrong: ' + err.message;
      }
    }
  }
};
</script>
