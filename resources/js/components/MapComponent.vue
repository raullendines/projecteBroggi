<template>
  <div class="container">
    <div id="map" class="map-size"></div>
  </div>
</template>

<script>
export default {
  data() {
      return{
       localizacion: "Plaza Urquinaona 10, Barcelona"
      };
  },
  mounted() {
    mapboxgl.accessToken =
      "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
    const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
    mapboxClient.geocoding
      .forwardGeocode({
        query: this.localizacion,
        autocomplete: false,
        limit: 1,
      })
      .send()
      .then((response) => {
        if (
          !response ||
          !response.body ||
          !response.body.features ||
          !response.body.features.length
        ) {
          console.error("Invalid response:");
          console.error(response);
          return;
        }
        const feature = response.body.features[0];

        const map = new mapboxgl.Map({
          container: "map",
          style: "mapbox://styles/mapbox/streets-v11",
          center: feature.center,
          zoom: 10,
        });

        // Create a marker and add it to the map.
        new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
      });
  },
};
</script>
<style>
.container {
  aspect-ratio: 16/9;
  height: 100%;
}

.map-size {
  align-content: center;
  height: 100%;
}
</style>
