<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="modal" id="modalFormManagement" name="modalFormManagement" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ trucada.codi_trucada }}</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <h5><b>Identificació de l'interlocutor</b></h5>

              <div class="row">
                <div class="col-12">
                  <label for="localitzacio" class="form-label"
                    >Localització</label
                  >
                  <select
                    v-model="trucada.fora_catalunya"
                    id="fora_catalunya"
                    name="fora_catalunya"
                    class="form-select"
                    aria-label="fora_catalunya"
                    disabled
                  >
                    <option selected value="">Selecciona una opció</option>
                    <option value="1">Catalunya</option>
                    <option value="0">Altres</option>
                  </select>

                  <div id="fora_catalunya" class="form-text">
                    * Localització de l'incident
                  </div>
                </div>

                <div class="col-6">
                  <label for="nom_trucada" class="form-label">Nom</label>
                  <input
                    v-if="expMsg.msg === 'modificar'"
                    type="text"
                    class="form-control"
                    name="nom_trucada"
                    id="nom_trucada"
                    v-model="trucada.nom_trucada"
                    aria-describedby="nom_trucada"
                    placeholder="Escriu aquí"
                  />

                  <input
                    v-else
                    type="text"
                    class="form-control"
                    name="nom_trucada"
                    id="nom_trucada"
                    v-model="trucada.nom_trucada"
                    aria-describedby="nom_trucada"
                    placeholder="Escriu aquí"
                    disabled
                  />

                  <div id="nom_trucada" class="form-text">
                    * Nom de l'interlocutor
                  </div>
                </div>

                <div class="col-6">
                  <label for="adreca_trucada" class="form-label">Adreça</label>
                  <input
                    type="text"
                    class="form-control"
                    name="adreca_trucada"
                    id="adreca_trucada"
                    v-model="trucada.adreca_trucada"
                    aria-describedby="adreca_trucada"
                    placeholder="Escriu aquí"
                    disabled
                  />
                  <div id="adreca_trucada" class="form-text">
                    * Adreça de l'interlocutor
                  </div>
                </div>

                <div class="col-4">
                  <label for="procedencia_trucada" class="form-label">Procedencia</label>
                  <input
                    type="text"
                    class="form-control"
                    name="procedencia_trucada"
                    id="procedencia_trucada"
                    aria-describedby="procedencia_trucada"
                    v-model="trucada.procedencia_trucada"
                    placeholder="Escriu aquí"
                    disabled
                  />
                  <div id="procedencia_trucada" class="form-text">
                    * Des d'on es realitza la trucada.
                  </div>
                </div>

                <div class="col-4">
                  <label for="provincies_id" class="form-label"
                    >Provincia</label
                  >
                  <select
                    id="provincies_id"
                    name="provincies_id"
                    class="form-select"
                    aria-label="provincia"
                    v-model="trucada.provincies_id"
                    disabled
                  >
                    <option selected value="">Selecciona una opció</option>
                    <option
                      v-for="provincia in provincies"
                      :key="provincia.id"
                      :value="provincia.id"
                    >
                      {{ provincia.nom }}
                    </option>
                  </select>
                  <div id="provincies_id" class="form-text">
                    * Provincia de l'interlocutor
                  </div>
                </div>

                <div class="col">
                  <label for="municipis_id" class="form-label">Municipi</label>
                  <select
                    id="municipis_id"
                    name="municipis_id"
                    v-model="trucada.municipis_id"
                    class="form-select"
                    aria-label="municipis_id"
                    disabled
                  >
                    <option selected value="">Selecciona una opció</option>
                    <option
                      v-for="municipi in municipis"
                      :key="municipi.id"
                      :value="municipi.id"
                    >
                      {{ municipi.nom }}
                    </option>
                  </select>
                  <div id="municipis_id" class="form-text">
                    * Municipi de l'interlocutor
                  </div>
                </div>

                <h5><b>Tipificació de l'incident</b></h5>

                <div class="col-6">
                   <label for="tipusIncident" class="form-label">Tipus d'incident</label>
                  <input
                    type="text"
                    class="form-control"
                    name="tipusIncident"
                    id="tipusIncident"
                    aria-describedby="tipusIncident"
                    placeholder="Escriu aquí"
                    :value="this.typeAccident"
                    disabled
                  />
                  <div id="tipusIncident" class="form-text">
                    * Tipus d'incident que hi ha causat
                  </div>
                </div>
                <div class="col-6">
                  <label for="incidents_id" class="form-label">Incident</label>
                  <select
                    id="incidents_id"
                    name="incidents_id"
                    v-model="trucada.incidents_id"
                    class="form-select"
                    aria-label="incidents_id"
                    disabled
                  >
                    <option selected value="">Selecciona una opció</option>
                    <option
                      v-for="incident in incidents"
                      :key="incident.id"
                      :value="incident.id"
                    >
                      {{ incident.descripcio }}
                    </option>
                  </select>
                  <div id="incidents_id" class="form-text">
                    * Incident que hi ha causat
                  </div>
                </div>


                <div class="col-6">
                <label class="form-label" for="notaComunaInput"
                  >Nota comuna</label
                >
                <textarea
                  v-if="expMsg.msg === 'modificar'"
                  class="form-control"
                  placeholder="Escriu aquí"
                  name="notaComunaInput"
                  id="notaComunaInput"
                  v-model="trucada.nota_comuna"
                  style="height: 100px"
                ></textarea>

                <textarea
                  v-else
                  class="form-control"
                  placeholder="Escriu aquí"
                  name="notaComunaInput"
                  id="notaComunaInput"
                  v-model="trucada.nota_comuna"
                  style="height: 100px"
                  disabled
                ></textarea>
                <div id="notaComunaInput" class="form-text">
                  * Altres anotacions d'interés
                </div>
              </div>

              <div class="col-6">
                <label for="phoneInput" class="form-label">Telèfon</label>
                <div class="input-group">
                  <span class="input-group-text" id="phoneInput">+34</span>
                  <input
                    v-if="expMsg.msg === 'modificar'"
                    type="tel"
                    name="phoneInput"
                    placeholder="Escriu aquí"
                    class="form-control"
                    id="phoneInput"
                    v-model="trucada.telefon"
                    aria-describedby="phoneInput"
                  />
                  <input
                    v-else
                    type="tel"
                    name="phoneInput"
                    placeholder="Escriu aquí"
                    class="form-control"
                    id="phoneInput"
                    v-model="trucada.telefon"
                    aria-describedby="phoneInput"
                    disabled
                  />
                </div>
                <div id="phoneInput" class="form-text">
                  * Número de telèfon
                </div>
              </div>

              <div class="col">
                <label for="estats_expedients_id" class="form-label">Estat Expedient</label>
                <select
                  v-if="expMsg.msg === 'modificar'"
                  id="estats_expedients_id"
                  name="estats_expedients_id"
                  class="form-select"
                  aria-label="estats_expedients_id"
                  v-model="expMsg.status"
                >
                  <option selected value="-1">Selecciona una opció</option>
                  <option v-for="stat in statusList"
                      :key="stat.id"
                      :value="stat.id">{{stat.estat}}</option>
                </select>

                <select
                  v-else
                  id="estats_expedients_id"
                  name="estats_expedients_id"
                  class="form-select"
                  aria-label="estats_expedients_id"
                  v-model="expMsg.status"
                  disabled
                >
                  <option selected value="-1">Selecciona una opció</option>
                  <option v-for="stat in statusList"
                      :key="stat.id"
                      :value="stat.id">{{stat.estat}}</option>
                </select>
                <div id="estats_expedients_id" class="form-text">* Agències predefinides</div>
              </div>

              <input type="hidden" name="id" id="id" v-model="trucada.id">
              <input type="hidden" name="estats_id" id="estats_id" v-model="expMsg.statusId">
              <input type="hidden" name="data_ultima_modificacio" id="data_ultima_modificacio" v-model="currentdate">

              </div>
            </div>

            <div class="modal-footer">
              <button
                v-if="expMsg.msg === 'modificar'"
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
                @click="sendExpedient()"
              >
                Enviar
              </button>
              <button
              v-else
              type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
                >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  data() {
    return {
      trucada: {
        id: "",
        codi_trucada: "",
        data_hora: "",
        temps_trucada: "",
        dades_personals_id: "",
        telefon: "",
        procedencia_trucada: "",
        origen_trucada: "",
        nom_trucada: "",
        municipis_id_trucada: "",
        adreca_trucada: "",
        fora_catalunya: "",
        provincies_id: "",
        municipis_id: "",
        tipus_localitzacions_id: "",
        descripcio_localitzacio: "",
        detall_localitzacio: "",
        altres_ref_localitzacio: "",
        incidents_id: "",
        nota_comuna: "",
        expedients_id: "",
        usuaris_id: "",
      },
      provincies: [],
      municipis: [],
      tipusIncidents: [],
      incidents: [],
      indexIncident: 0,
      incident: [],
      indexTipusIncident:[],
      typeAccident: "",
      currentdate: "",
      updExp: {
          data_ultima_modificacio: "",
          estats_expedients_id:""
      },
      expedientesList:[],
    };
  },
  props: {
    expMsg: [],
    statusList: []
  },
  methods: {
    selectProvincies() {
      let me = this;
      axios
        .get("/provincies/")
        .then((response) => {
          me.provincies = response.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    selectMunicipis() {
      let me = this;
      axios
        .get("/municipis/")
        .then((response) => {
          me.municipis = response.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    selectIncidents() {
      let me = this;
      axios
        .get("/incidents/")
        .then((response) => {
          me.incidents = response.data;
          me.indexIncident = me.incidents.map((object) => object.id).indexOf(this.trucada.incidents_id);
          me.incident = me.incidents[me.indexIncident].classes_incidents_id;
          this.selectTipusIncident();
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },

      selectTipusIncident() {
      let me = this;
      axios
        .get("/incidents_types/")
        .then((response) => {
          me.tipusIncidents = response.data;
          me.indexTipusIncident = me.tipusIncidents.map((object) => object.id).indexOf(me.incident);
          me.typeAccident = me.tipusIncidents[me.indexTipusIncident].descripcio;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    sendExpedient() {
        let me = this;
        me.updateExpedient();
        me.updateStatus();
        window.location.reload();
    },
    updateExpedient() {
        let me = this;
        axios
            .put('/callCards2/' + me.trucada.id, me.trucada)
            .then(function(response){
                console.log(response);
            }).catch(function(error){
                console.log(error.response.status);
                console.log(error.response.data);
            });
    },
    updateStatus() {
        let me = this;
        me.moment();
        const statusExp = document.querySelector("select[name=estats_expedients_id]").value
         me.updExp.data_ultima_modificacio = me.currentdate;
        me.updExp.estats_expedients_id = statusExp;
        axios
            .put('/expedients/'+ me.expMsg.statusId , me.updExp)
            .then(function(response){
                console.log(response);
            }).catch(function(error){
                console.log(error.response.status);
                console.log(error.response.data);
            });
    },
    getExpedients(val) {
        let me = this;
        axios
        .get("/expedients/" + val)
        .then((response) => {
          me.expedientesList = response.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));

    },
    moment: function () {
            moment.locale('es');
            this.currentdate = moment(new Date()).format('YYYY-MM-DD h:mm:ss');
            return this.currentdate;
        },
  },
  created() {},
  mounted() {
    console.log("Component mounted.");
    this.$root.$on("CallManagementComponent", () => {
      let me = this;
      me.trucada = me.expMsg.call;
      me.selectProvincies();
      me.selectMunicipis();
      me.selectIncidents();
      me.getExpedients(me.expMsg.statusId);
          });
  },
};
</script>
