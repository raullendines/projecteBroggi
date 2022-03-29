<template>
  <div class="container">
    <div id="map" class="map-size"></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      agencies: []
    };
  },
  methods: {
    selectAgencies() {
      let me = this;
      axios
        .get("/agencies/")
        .then((response) => {
          me.agencies = response.data;
          console.log(me.agencies.length);
          for (let i = 0; i < 1; i++) {
             this.createMapAgencies(i);
          }
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    createMapAgencies(i){
    console.log(this.agencies.length);
    
    mapboxgl.accessToken =
      "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
    const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
      mapboxClient.geocoding
        .forwardGeocode({
          query: this.agencies[i],
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

    }

  },
  mounted() {
    this.selectAgencies();
    
    
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
