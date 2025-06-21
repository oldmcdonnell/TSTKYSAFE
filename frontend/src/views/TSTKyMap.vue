<template>
  <div>
    <GoogleMap :center="userLocation" />
    <CheckInForm :location="userLocation" />
  </div>
</template>

<script>
import CheckInForm from '../components/CheckInForm.vue'
import GoogleMap from '../components/GoogleMap.vue'

export default {
  components: {
    CheckInForm,
    GoogleMap
  },
  data() {
    return {
      userLocation: { lat: null, lng: null }
    }
  },
  mounted() {
    navigator.geolocation.getCurrentPosition(position => {
      this.userLocation.lat = position.coords.latitude
      this.userLocation.lng = position.coords.longitude
    })
  }
}
</script>
