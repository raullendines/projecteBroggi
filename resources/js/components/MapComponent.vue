<template>
  <div class="container mt-3" style="display: flex; flex-wrap: wrap">
    <div id="map" class="map-size col-10"></div>
    <!-- <div class="col search-box p-2">
      <h3><b>Agencies</b></h3>
      <br />
      <h5>Policia</h5>
      <input
        type="checkbox"
        id="guardiaUrbana"
        name="guardiaUrbana"
        value="guardiaUrbana"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="guardiaUrbana"> Guardia Urbana</label><br />

      <input
        type="checkbox"
        id="policiaMunicipal"
        name="policiaMunicipal"
        value="policiaMunicipal"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="policiaMunicipal"> Policia Municipal</label><br />

      <input
        type="checkbox"
        id="policiaLocal"
        name="policiaLocal"
        value="policiaLocal"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="policiaLocal"> Policia Local</label><br />

      <input
        type="checkbox"
        id="mossosEsquadra"
        name="mossosEsquadra"
        value="mossosEsquadra"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="mossosEsquadra"> Mossos Esquadra</label><br />
      <br />
      <h5>Bombers</h5>
      <input
        type="checkbox"
        id="bombersVoluntaris"
        name="bombersVoluntaris"
        value="bombersVoluntaris"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="bombersVoluntaris"> Bombers Volutaris</label><br />

      <input
        type="checkbox"
        id="bombers"
        name="bombers"
        value="bombers"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="bombers"> Bombers</label><br />

      <br />
      <h5>Ajuda al ciutadà</h5>
      <input
        type="checkbox"
        id="transit"
        name="transit"
        value="transit"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="transit"> Transit</label><br />

      <input
        type="checkbox"
        id="atencioCiutadana"
        name="atencioCiutadana"
        value="atencioCiutadana"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="atencioCiutadana"> Atenció Ciutadana</label><br />

      <br />
      <h5>Seleccionar tots</h5>
      <input
        type="checkbox"
        id="selectAll"
        name="selectAll"
        value="selectAll"
        v-model="selected_agency"
        @change="selectAllAgencies()"
      />
      <label for="selectAll"> Tots</label><br />
    </div> -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      selected_agency: [],
      marker: {},
      policiaMunicipalMarker: {},
      guardiaUrbanaMarker: {},
      mossosEsquadraMarker: {},
      bombersVoluntarisMarker: {},
      bombersMarker: {},
      transitMarker: {},
      atencioCiutadanaMarker: {},
      agencies: [],
      mapa: {},
      marcador: {
        id: "",
        marker: ""
      },
      listMarcador: [],
      incident: "Plaça Urquinaona 10, Barcelona",
    };
  },
  methods: {
    selectIncidencia() {
      let me = this;
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
          ) {
            console.error("Invalid response:");
            console.error(response);
            return;
          }

          const feature = response.body.features[0];
          
          this.createMap(feature);

          var description = "<p><b>" + this.incident + "</b></p>" + "<button type='button' class='btn btn-outline-secondary'>Afegir</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          const el = document.createElement("div");
          el.id = "marker";

          this.marker = new mapboxgl.Marker({ color: "#BA0001" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    selectAllAgencies() {
      let me = this;
      
      axios
        .get("/agencies/")
        .then((response) => {
          me.agencies = response.data;
        
          
          for (const agencia of this.agencies) {
            if (
              agencia.nom.includes("Policia Local") 
            ) {
              this.createMapPoliciaLocal(agencia);
            } 
            else  if (
              agencia.nom.includes("Parc de Bombers Voluntaris")
            ) {
              this.createMapBombersVoluntaris(agencia);
            } else if (
              agencia.nom.includes("Parc de Bombers")
            ) {
              this.createMapBombers(agencia);
            } else if (
              agencia.nom.includes("Àrea Regional de Trànsit") 
            ) {
              this.createMapTransit(agencia);
            } else if (
              agencia.nom.includes("Mossos d'Esquadra")
            ) {
              this.createMapMossos(agencia);
            } else if (
              agencia.nom.includes("Guàrdia Urbana") 
            ) {
              this.createMapGuardiaUrbana(agencia);
            } else if (
              agencia.nom.includes("Oficina d'Atenció Ciutadana") 
            ) {
              this.createMapAtencioCiutadana(agencia);
            } else if (
              agencia.nom.includes("Policia Municipal") 
            ) {
              this.createMapPoliciaMunicipal(agencia);
            } 
          }
        })
        .catch((err) => {
           console.log(err);
        })
        .finally(() => (this.loading = false));
    },

    createMapPoliciaLocal(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Afegir</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          this.marker = new mapboxgl.Marker({ color: "#575455" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
            
            this.marcador.id = agencia.id;
            this.marcador.marker = this.marker;

            this.listMarcador.push(this.marcador);


        });
    },

    checkedPoliciaLocal(agencia){
      if (this.policiaLocal.checked == true) {
        this.createMapPoliciaLocal(agencia);
      }
      else{
        this.removeMapPoliciaLocal(agencia);
      }
    },

    removeMapPoliciaLocal(agencia) {
      for (const agencia of this.agencies) {
        for (const mark of this.listMarcador) {
          if (agencia.id == mark.id){
            mark.marker.remove();
            marl.marker.remove();

          }
        }
      }
    },

    createMapPoliciaMunicipal(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Primary</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker({ color: "#1E55A5" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    createMapAtencioCiutadana(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Primary</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker({ color: "#000002" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    createMapBombers(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Primary</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker({ color: "#08743D" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    createMapGuardiaUrbana(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Primary</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker({ color: "#F58D2F" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    createMapTransit(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Primary</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker({ color: "#F16AA8" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    createMapMossos(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Primary</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker({ color: "#6A4D9F" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    createMapBombersVoluntaris(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Primary</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker({ color: "#ECE70D" })
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    createMapAgencies(agencia) {
      let me = this;

      mapboxgl.accessToken =
        "pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA";
      const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
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
          var description =
            "<p><b>" +
            agencia.nom +
            "</b></p>" +
            "<button type='button' class='btn btn-outline-secondary'>Primary</button>";

          const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(description);

          // create DOM element for the marker
          const el = document.createElement("div");
          el.id = "marker";

          // Create a marker and add it to the map.
          new mapboxgl.Marker()
            .setLngLat(feature.center)
            .setPopup(popup)
            .addTo(me.mapa);
        });
    },

    createPopUp() {},

    createMap(feature) {
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
