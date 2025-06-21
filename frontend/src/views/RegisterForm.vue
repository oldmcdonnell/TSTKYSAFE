<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Register</h2>
    <form @submit.prevent="register">
      <div class="mb-4">
        <label class="block text-gray-700">Name</label>
        <input v-model="form.name" type="text" class="w-full border px-3 py-2 rounded" required />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Email</label>
        <input v-model="form.email" type="email" class="w-full border px-3 py-2 rounded" required />
      </div>

      <div class="mb-4">
        <label class="block text-gray-700">Password</label>
        <input v-model="form.password" type="password" class="w-full border px-3 py-2 rounded" required />
      </div>

      <div class="mb-6">
        <label class="block text-gray-700">Confirm Password</label>
        <input v-model="form.password_confirmation" type="password" class="w-full border px-3 py-2 rounded" required />
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        Register
      </button>

      <p v-if="error" class="mt-4 text-red-500">{{ error }}</p>
      <p v-if="success" class="mt-4 text-green-500">✅ Registration successful!</p>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      },
      error: null,
      success: false
    }
  },
  methods: {
    async register() {
      this.error = null;
      this.success = false;
      try {
        const response = await fetch('http://127.0.0.1:8000/api/register', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(this.form)
        });

        if (!response.ok) {
          const err = await response.json();
          this.error = err.message || 'Registration failed';
          return;
        }

        this.success = true;
        this.form = { name: '', email: '', password: '', password_confirmation: '' };

      } catch (err) {
        this.error = 'Something went wrong: ' + err.message;
      }
    }
  }
}
</script>
