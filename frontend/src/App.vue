<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" />
    <HelloWorld msg="Welcome to Your Vue.js App" />
    <CheckInForm />
    <Map />
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import CheckInForm from './components/CheckInForm.vue'
import Map from './components/Map.vue'

export default {
  name: 'App',
  components: {
    HelloWorld,
    CheckInForm,
    Map
  },
  mounted() {
    fetch(`${process.env.VUE_APP_API_BASE}/api/ping`)
      .then(res => res.json())
      .then(data => console.log("✅ Ping Success:", data))
      .catch(err => console.error("❌ Ping Error:", err));
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
