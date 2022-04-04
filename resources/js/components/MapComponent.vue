<template>
  <div class="container">
<!--     <div class="row">
 -->      <div id="map" class="map-size col"></div>
<!--     </div>
 -->  </div>
</template>

<script>
export default {
  data() {
    return {
      agencies: [],
      mapa: {},
      incident: "Plaça Urquinaona 10, Barcelona"
    };
  },
  methods: {
    selectIncidencia() {
      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
      mapboxClient.geocoding
        .forwardGeocode({
          query: this.incident,
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
          ) 
          {
            console.error("Invalid response:");
            console.error(response);
            return;
          }

          const feature = response.body.features[0];

          this.createMap(feature);
        });
    },
    selectAllAgencies() {
      console.log("selectAgencies");
      let me = this;
      axios
        .get("/agencies/")
        .then((response) => {
          me.agencies = response.data;
          for (const agencia of this.agencies) {
            this.createMapAgencies(agencia);
          }
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },

    createMapAgencies(agencia) {
      let me = this;
      console.log("createMapAgencies");

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
      console.log(agencia);
      mapboxClient.geocoding
        .forwardGeocode({
          query: agencia.carrer + ", " + agencia.municipis.nom,
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
          // create the popup
          const popup = new mapboxgl.Popup({ offset: 25 }).setText("ID: " +agencia.id);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker().setLngLat(feature.center).setPopup(popup).addTo(me.mapa);
        });
    },

    createPopUp() {},

    createMap(feature) {
      console.log("createMap");
      const map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v11",
        center: feature.center,
        zoom: 12,
      });

      this.mapa = map;

      new mapboxgl.Marker({
        color: "#FF0000",
      })
        .setLngLat(feature.center)
        .addTo(map);

      this.selectAllAgencies();
    },
  },
  mounted() {
    console.log("mounted");
    this.selectIncidencia();
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
