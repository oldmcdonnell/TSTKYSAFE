<template>
  <div ref="map" class="w-full h-96 rounded shadow" />
</template>

<script>
/* global google */
const apiKey = import.meta.env.VITE_GOOGLE_MAPS_API_KEY;
export default {
  name: 'GoogleMap',
  props: {
    center: {
      type: Object,
      required: true,
      default: () => ({ lat: 37.7749, lng: -122.4194 })
    }
  },
  data() {
    return {
      map: null,
      marker: null
    };
  },
  mounted() {
    if (!window.google) {
      const script = document.createElement('script');
      script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap`;
      script.async = true;
      window.initMap = this.initMap;
      document.head.appendChild(script);
    } else {
      this.initMap();
    }
  },
  methods: {
    initMap() {
      this.map = new google.maps.Map(this.$refs.map, {
        center: this.center,
        zoom: 14
      });

      this.marker = new google.maps.Marker({
        position: this.center,
        map: this.map
      });

      this.map.addListener('click', (e) => {
        const coords = {
          lat: e.latLng.lat(),
          lng: e.latLng.lng()
        };

        this.marker.setPosition(coords);
        this.$emit('locationSelected', coords);
      });
    }
  }
};
</script>

<style scoped>
/* Add styles if needed */
</style>
