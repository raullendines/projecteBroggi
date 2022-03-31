<template>
  <div>
<div
    class="modal"
    id="modalForm"
    tabindex="-1"
    data-bs-backdrop="static"
    aria-labelledby="modalFormLabel"
    aria-hidden="true"
  >
    <div
      class="
        modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable
      "
    >
      <div class="modal-content">
        <div class="modal-body">
          <form>
            <h5><b>Identificació de l'interlocutor</b></h5>
            <div class="row mb-4">
              <div class="col">
                <label for="localitzacio" class="form-label"
                  ><vermell>*</vermell>Localització</label
                >
                <select
                  v-model="trucada.localitzacio"
                  id="localitzacio"
                  name="localitzacio"
                  class="form-select"
                  aria-label="localitzacio"
                >
                  <option selected value="">Selecciona una opció</option>
                  <option value="1">Catalunya</option>
                  <option value="0">Altres</option>
                </select>
                <div id="localitzacio" class="form-text">
                  * Localització de l'incident
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="nomIntelocutor" class="form-label"
                  >Nom</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="nomIntelocutor"
                  id="nomIntelocutor"
                  v-model="trucada.nomIntelocutor"
                  aria-describedby="nomIntelocutor"
                  placeholder="Escriu aquí"
                />
                <div id="nomIntelocutor" class="form-text">
                  * Nom de l'interlocutor
                </div>
              </div>
              <div class="col">
                <label for="adreca" class="form-label"
                  >Adreça</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="adreca"
                  id="adreca"
                  v-model="trucada.adreca"
                  aria-describedby="adreca"
                  placeholder="Escriu aquí"
                />
                <div id="adreca" class="form-text">
                  * Adreça de l'interlocutor
                </div>
              </div>
            </div>
            <!-- IF -->
            <div v-if="trucada.localitzacio === '1'" class="row mb-4">
              <div class="col">
                <label for="procedenciaInput" class="form-label"
                  ><vermell>*</vermell>Procedencia</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="procedenciaInput"
                  id="procedenciaInput"
                  aria-describedby="procedenciaInput"
                  v-model="trucada.procedenciaInput"
                  placeholder="Escriu aquí"
                />
                <div id="procedenciaInput" class="form-text">
                  * Des d'on es realitza la trucada.
                </div>
              </div>
              <div class="col">
                <label for="provincia" class="form-label"
                  ><vermell>*</vermell>Provincia</label
                >
                <select
                  id="selectProvincia"
                  name="selectProvincia"
                  class="form-select"
                  aria-label="provincia"
                  v-model="trucada.selectProvincia"
                  @change="selectComarques()"
                >
                  <option selected value="">Selecciona una opció</option>
                  <option v-for="provincia in provincies" :key="provincia.id" :value="provincia.id" >{{ provincia.nom }}</option>
                </select>
                <div id="selectProvincia" class="form-text">
                  * Provincia de l'interlocutor
                </div>
              </div>
              <div class="col">
                <label for="comarca" class="form-label"
                  ><vermell>*</vermell>Comarca</label
                >
                <select
                  id="comarca"
                  name="comarca"
                  class="form-select"
                  aria-label="comarca"
                  v-model="selectComarca"
                  @change="selectMunicipis()"
                >
                  <option selected value="">Selecciona una opció</option>
                  <option v-for="comarca in comarques" :key="comarca.id" :value="comarca.id">{{comarca.nom}}</option>
                </select>
                <div id="comarca" class="form-text">
                  * Comarca de l'interlocutor
                </div>
              </div>
              <div class="col">
                <label for="selectMunicipi" class="form-label"
                  ><vermell>*</vermell>Municipi</label
                >
                <select
                  id="selectMunicipi"
                  name="selectMunicipi"
                  v-model="trucada.selectMunicipi"
                  class="form-select"
                  aria-label="selectMunicipi"
                >
                  <option selected value="">Selecciona una opció</option>
                  <option v-for="municipi in municipis" :key="municipi.id" :value="municipi.id" >{{ municipi.nom }}</option>
                </select>
                <div id="selectMunicipi" class="form-text">
                  * Municipi de l'interlocutor
                </div>
              </div>
            </div>
            <!-- ELSE -->
            <div v-else class="row mb-4">
              <div class="col">
                <label for="procedenciaInput" class="form-label"
                  ><vermell>*</vermell>Procedencia</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="procedenciaInput"
                  id="procedenciaInput"
                  aria-describedby="procedenciaInput"
                  placeholder="Escriu aquí"
                />
                <div id="procedenciaInput" class="form-text">
                  * Nacionalitat de l'interlocutor
                </div>
              </div>
              <div class="col">
                <label for="provinciaInput" class="form-label"><vermell>*</vermell>Provincia</label>
                <input
                  type="text"
                  class="form-control"
                  name="provinciaInput"
                  id="provinciaInput"
                  aria-describedby="provinciaInput"
                  placeholder="Escriu aquí"
                />
                <div id="provinciaInput" class="form-text">
                  * Provincia de l'interlocutor
                </div>
              </div>
              <div class="col">
                <label for="municipioInput" class="form-label">Municipi</label>
                <input
                  type="text"
                  class="form-control"
                  name="municipioInput"
                  id="municipioInput"
                  aria-describedby="municipioInput"
                  placeholder="Escriu aquí"
                />
                <div id="municipioInput" class="form-text">
                  * Ciutat de l'interlocutor
                </div>
              </div>
            </div>
            <div class="row">
              <hr />
            </div>
            <div v-if="trucada.localitzacio === '1'" class="row mb-4">
              <h5><b>Localització de l'emergencia</b></h5>
              <div class="col">
                <label for="tipusLoc" class="form-label"
                  ><vermell>*</vermell>Tipus de localització</label
                >
                <select
                  id="tipusLoc"
                  v-model="trucada.tipusLoc"
                  name="tipusLoc"
                  class="form-select"
                  aria-label="tipusLoc"
                >
                  <option selected value="">Selecciona una opció</option>
                  <option value="1">Carrer</option>
                  <option value="2">Punt Singular</option>
                  <option value="3">Entitat població</option>
                  <option value="4">Carretera</option>
                  <option value="5">Provincia</option>
                </select>
                <div id="provincia" class="form-text">
                  * Tipus de via o lloc on es troba l'incident
                </div>
              </div>
            </div>

            <div
              v-if="trucada.tipusLoc === '' && trucada.localitzacio === '1'"
            >
              <div class="row">
                <hr />
              </div>
            </div>
            <div v-if="trucada.tipusLoc === '3'">
              <div class="row mb-4">
                <div class="col">
                  <label class="form-label" for="referenciesLoc3"
                    >Altres referències de la localització</label
                  >
                  <textarea
                    class="form-control"
                    placeholder="Escriu aquí"
                    name="referenciesLoc3"
                    id="referenciesLoc3"
                    v-model="trucada.referenciesLoc3"
                    style="height: 50px"
                  ></textarea>
                  <div id="referenciesLoc3" class="form-text">
                    * Altres anotacions d'interés sobre la localització
                  </div>
                </div>
              </div>
              <div class="row">
                <hr />
              </div>
            </div>
            <div v-if="trucada.tipusLoc === '5'">
              <div class="row mb-4">
                <div class="col">
                  <label class="form-label" for="referenciesLoc5"
                    >Altres referències de la localització</label
                  >
                  <textarea
                    class="form-control"
                    placeholder="Escriu aquí"
                    name="referenciesLoc5"
                    v-model="trucada.referenciesLoc5"
                    id="referenciesLoc5"
                    style="height: 50px"
                  ></textarea>
                  <div id="referenciesLoc5" class="form-text">
                    * Altres anotacions d'interés sobre la localització
                  </div>
                </div>
              </div>
              <div class="row">
                <hr />
              </div>
            </div>

            <div v-if="trucada.tipusLoc === '1'">
              <div class="row mb-4">
                <div class="col">
                  <label for="tipusVia" class="form-label"
                    ><vermell>*</vermell>Tipus de via</label
                  >
                  <select
                    id="tipusVia"
                    name="tipusVia"
                    v-model="trucada.tipusVia"
                    class="form-select"
                    aria-label="tipusVia"
                  >
                    <option selected value="carrer">Carrer</option>
                    <option value="avinguda">Avinguda</option>
                    <option value="bulevar">Bulevar</option>
                    <option value="carrerPeatonal">Carrer peatonal</option>
                    <option value="cami">Camí</option>
                  </select>
                  <div id="tipusVia" class="form-text">
                    * Tipus de via de la direcció
                  </div>
                </div>
                <div class="col">
                  <label for="nomVia" class="form-label"
                    ><vermell>*</vermell>Nom</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="nomVia"
                    id="nomVia"
                    v-model="trucada.nomVia"
                    aria-describedby="nomVia"
                    placeholder="Escriu aquí"
                  />
                  <div id="nomVia" class="form-text">* Nom de la via</div>
                </div>
                <div class="col">
                  <label for="numVia" class="form-label"
                    ><vermell>*</vermell>Número</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    name="numVia"
                    v-model="trucada.numVia"
                    id="numVia"
                    aria-describedby="numVia"
                    placeholder="Escriu aquí"
                  />
                  <div id="numVia" class="form-text">* Número de la via</div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <label for="escala" class="form-label">Escala</label>
                  <input
                    type="text"
                    class="form-control"
                    name="escala"
                    id="escala"
                    v-model="trucada.escala"
                    aria-describedby="escala"
                    placeholder="Escriu aquí"
                  />
                  <div id="escala" class="form-text">* Escala ubicada</div>
                </div>
                <div class="col">
                  <label for="pis" class="form-label">Pis</label>
                  <input
                    type="number"
                    class="form-control"
                    name="pis"
                    id="pis"
                    v-model="trucada.pis"
                    aria-describedby="pis"
                    placeholder="Escriu aquí"
                  />
                  <div id="pis" class="form-text">* Pis incident</div>
                </div>
                <div class="col">
                  <label for="porta" class="form-label">Porta</label>
                  <input
                    type="number"
                    class="form-control"
                    name="porta"
                    id="porta"
                    v-model="trucada.porta"
                    aria-describedby="porta"
                    placeholder="Escriu aquí"
                  />
                  <div id="porta" class="form-text">* Porta incident</div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <label class="form-label" for="referenciesLoc1"
                    >Altres referències de la localització</label
                  >
                  <textarea
                    class="form-control"
                    placeholder="Escriu aquí"
                    name="referenciesLoc1"
                    v-model="trucada.referenciesLoc1"
                    id="referenciesLoc1"
                    style="height: 50px"
                  ></textarea>
                  <div id="referenciesLoc1" class="form-text">
                    * Altres anotacions d'interés sobre la localització
                  </div>
                </div>
              </div>
              <div class="row">
                <hr />
              </div>
            </div>

            <div v-if="trucada.tipusLoc === '4'">
              <div class="row mb-4">
                <div class="col">
                  <label for="nomCarretera" class="form-label">Nom</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nomCarretera"
                    id="nomCarretera"
                    v-model="trucada.nomCarretera"
                    aria-describedby="nomCarretera"
                    placeholder="Escriu aquí"
                  />
                  <div id="nomCarretera" class="form-text">
                    * Nom de la carretera on hi ha l'incident
                  </div>
                </div>
                <div class="col">
                  <label for="puntKilometric" class="form-label"
                    >Punt Kilomètric</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    name="puntKilometric"
                    id="puntKilometric"
                    v-model="trucada.puntKilometric"
                    aria-describedby="puntKilometric"
                    placeholder="Escriu aquí"
                  />
                  <div id="puntKilometric" class="form-text">
                    * Punt kilomètric de la carretera on hi ha l'incident
                  </div>
                </div>
                <div class="col">
                  <label for="sentitCarretera" class="form-label">Sentit</label>
                  <input
                    type="text"
                    class="form-control"
                    name="sentitCarretera"
                    id="sentitCarretera"
                    v-model="trucada.sentitCarretera"
                    aria-describedby="sentitCarretera"
                    placeholder="Escriu aquí"
                  />
                  <div id="sentitCarretera" class="form-text">
                    * Sentit de la carretera on hi ha l'incident
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <label class="form-label" for="referenciesLoc4"
                    >Altres referències de la localització</label
                  >
                  <textarea
                    class="form-control"
                    placeholder="Escriu aquí"
                    name="referenciesLoc4"
                    id="referenciesLoc4"
                    v-model="trucada.referenciesLoc4"
                    style="height: 50px"
                  ></textarea>
                  <div id="referenciesLoc4" class="form-text">
                    * Altres anotacions d'interés sobre la localització
                  </div>
                </div>
              </div>
              <div class="row">
                <hr />
              </div>
            </div>

            <div v-if="trucada.tipusLoc === '2'">
              <div class="row mb-4">
                <div class="col">
                  <label for="nomPunt" class="form-label"
                    ><vermell>*</vermell>Nom</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="nomPunt"
                    id="nomPunt"
                    v-model="trucada.nomPunt"
                    aria-describedby="nomPunt"
                    placeholder="Escriu aquí"
                  />
                  <div id="nomPunt" class="form-text">
                    * Nom del punt singular on hi ha l'incident
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <label class="form-label" for="referenciesLoc2"
                    >Altres referències de la localització</label
                  >
                  <textarea
                    class="form-control"
                    placeholder="Escriu aquí"
                    name="referenciesLoc2"
                    id="referenciesLoc2"
                    v-model="trucada.referenciesLoc2"
                    style="height: 50px"
                  ></textarea>
                  <div id="referenciesLoc2" class="form-text">
                    * Altres anotacions d'interés sobre la localització
                  </div>
                </div>
              </div>
              <div class="row">
                <hr />
              </div>
            </div>

            <div class="row">
              <h5><b>Tipificació de l'incident</b></h5>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label for="tipusIncident" class="form-label"
                  ><vermell>*</vermell>Tipus d'incident</label
                >
                <select
                  id="tipusIncident"
                  v-model="tipusIncident"
                  name="tipusIncident"
                  class="form-select"
                  aria-label="tipusIncident"
                  @change="selectIncidents()"
                >
                  <option selected value="">Selecciona una opció</option>
                  <option v-for="tipusIncident in tipusIncidents" :key="tipusIncident.id" :value="tipusIncident.id">{{tipusIncident.descripcio}}</option>
                </select>
                <div id="provincia" class="form-text">
                  * Tipus d'incident que hi ha causat
                </div>
              </div>
              <div class="col">
                <label for="incident" class="form-label"
                  ><vermell>*</vermell>Incident</label
                >
                <select
                  id="incident"
                  name="incident"
                  v-model="trucada.incident"
                  class="form-select"
                  aria-label="incident"
                >
                  <option selected value="">Selecciona una opció</option>
                  <option v-for="incident in incidents" :key="incident.id" :value="incident.id">{{incident.descripcio}}</option>
                </select>
                <div id="provincia" class="form-text">
                  * Incident que hi ha causat
                </div>
              </div>
            </div>

            <div class="row mb-4">
              <hr />
            </div>

            <div class="row mb-4">
              <div class="col">
                <label class="form-label" for="antecedents"
                  >Antecedents del telèfon</label
                >
                <textarea
                  class="form-control"
                  placeholder="Escriu aquí"
                  name="antecedents"
                  id="antecedents"
                  v-model="trucada.antecedents"
                  style="height: 60px"
                ></textarea>
                <div id="antecedents" class="form-text">
                  * Text amb informació rellevant del trucant
                </div>
              </div>
              <div class="col">
                <label for="phoneInput" class="form-label">Telèfon</label>
                <div class="input-group">
                  <span class="input-group-text" id="phoneInput">+34</span>
                  <input
                    type="tel"
                    name="phoneInput"
                    placeholder="Escriu aquí"
                    class="form-control"
                    id="phoneInput"
                    v-model="trucada.phoneInput"
                    aria-describedby="phoneInput"
                  />
                </div>
                <div id="phoneInput" class="form-text">
                  * Número de telèfon
                </div>
              </div>
              <div class="col">
                <label for="genereSelect" class="form-label">Gènere</label>
                <select
                  id="genereSelect"
                  name="genereSelect"
                  class="form-select"
                  aria-label="genereSelect"
                >
                  <option selected>Selecciona una opció</option>
                  <option value="Home">Home</option>
                  <option value="Dona">Dona</option>
                  <option value="Altres">Altres</option>
                </select>
                <div id="genereSelect" class="form-text">
                  * Gènere amb el que s'identifica
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <label class="form-label" for="notaComunaInput"
                  >Nota comuna</label
                >
                <textarea
                  class="form-control"
                  placeholder="Escriu aquí"
                  name="notaComunaInput"
                  id="notaComunaInput"
                  v-model="trucada.notaComunaInput"
                  style="height: 100px"
                ></textarea>
                <div id="notaComunaInput" class="form-text">
                  * Altres anotacions d'interés
                </div>
              </div>
              <div class="col">
                <label for="vipSelect" class="form-label">Agències</label>
                <select
                  id="selectAgencies"
                  name="selectAgencies"
                  class="form-select"
                  aria-label="selectAgencies"
                >
                  <option selected value="-1">Selecciona una opció</option>
                  <option value="vip1">VIP-1</option>
                  <option value="vip2">VIP-2</option>
                  <option value="vip3">VIP-3</option>
                </select>
                <div id="selectAgencies" class="form-text">* Agències predefinides</div>
              </div>
            </div>
            <div class="row">
                <hr />
              </div>
              <!-- fjakñslfjñasfjñaslfjkas -->
              <div class="row">
              <h5><b>Finalització del tractament</b></h5>
            </div>
              <div class="row">

              <div class="col">
                <label for="vipSelect" class="form-label">VIP</label>
                <select
                  id="vipSelect"
                  name="vipSelect"
                  class="form-select"
                  aria-label="vipSelect"
                >
                  <option selected>Selecciona una opció</option>
                  <option value="vip1">VIP-1</option>
                  <option value="vip2">VIP-2</option>
                  <option value="vip3">VIP-3</option>
                </select>
                <div id="vipSelect" class="form-text">* VIP predefinits</div>
              </div>
            </div>
            <input type="hidden" name="tempsTrucada" id="tempsTrucada" v-model="trucada.tempsTrucada">
            <input type="hidden" name="dataCreacio" id="dataCreacio" v-model="trucada.dataCreacio">
          </form>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <p class="">Temps de trucada: {{ formattedElapsedTime }}</p>
          <div>
            <button
              type="button"
              class="btn btn-primary"
              @click="stop(0)"
              data-bs-target="#penjarModal"
              data-bs-toggle="modal"
              data-bs-dismiss="modal"
            >
              Penjar
            </button>
            <button type="button" class="btn btn-secondary" @click="stop(1)" data-bs-dismiss="modal">
              Guardar i penjar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="penjarModal" aria-hidden="true" aria-labelledby="penjarModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Raó per la que pengem trucada sense completar expedient</h5>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col">
                <label for="raoPenjar" class="form-label">Raó:</label>
                <select
                  id="raoPenjar"
                  name="raoPenjar"
                  class="form-select"
                  aria-label="raoPenjar"
                >
                  <option selected>Selecciona una raó</option>
                  <option value="rao1">Raó 1</option>
                  <option value="rao2">Raó 2</option>
                  <option value="rao3">Raó 3</option>
                </select>
                <div id="vipSelect" class="form-text">* Per quina raó s'ha decidit penjar sense completar l'expedient.</div>
              </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#penjarModal" data-bs-dismiss="modal" aria-label="Close">Guardar i penjar</button>
      </div>
    </div>
  </div>
</div>
  </div>

</template>

<script>
export default {
  data() {
    return {
      elapsedTime: 0,
      timer: undefined,
      tipusIncident: "",
      provincies: [],
      municipis: [],
      comarques: [],
      tipusIncidents: [],
      incidents: [],
      selectComarca: "",
      tipusIncident: "",

      trucada: {
      procedenciaInput: '',
      dataCreacio: '',
      localitzacio: "",
      phoneInput: '',
      adreca: '',
      antecedents: '',
      tempsTrucada: '',
      nomIntelocutor: '',
      selectMunicipi: '',
      selectProvincia: "",
      tipusLoc: '',
      tipusVia: '',
      nomVia: '',
      numVia: '',
      escala: '',
      pis: '',
      porta: '',
      referenciesLoc1: '',
      nomPunt: '',
      referenciesLoc2: '',
      referenciesLoc3: '',
      nomCarretera: '',
      puntKilometric: '',
      sentitCarretera: '',
      referenciesLoc4: '',
      referenciesLoc5: '',
      incident: '',
      notaComunaInput: ''
      }
    };
  },
  computed: {
    formattedElapsedTime() {
      const date = new Date(null);
      date.setSeconds(this.elapsedTime / 1000);
      const utc = date.toUTCString();
      this.trucada.tempsTrucada = utc.substr(utc.indexOf(":") - 2, 8);
      return utc.substr(utc.indexOf(":") - 2, 8);
    },
  },
  methods: {
    start() {
      this.timer = setInterval(() => {
        this.elapsedTime += 1000;
      }, 1000);
    },
    stop(e) {
      clearInterval(this.timer);
      this.elapsedTime = 0;
      if (e === 0) {
          this.$emit('status', 'Declined');
      } else {
          this.$emit('status', 'Accepted');
      }
      this.currentDateTime();
    },
    selectProvincies() {
        let me = this;
          axios.get('/provincies/').then((response) => {
              me.provincies = response.data;
              console.log(me.provincies);
          })
          .catch((err) => {
              console.log(err);
          })
          .finally(() => (this.loading = false));
    },
    selectComarques() {
        let me = this;
        let provincia = this.selectProvincia;
          axios.get('/comarques/' + provincia).then((response) => {
              me.comarques = response.data;
              console.log(me.comarques);
          })
          .catch((err) => {
              console.log(err);
          })
          .finally(() => (this.loading = false));
    },
    selectMunicipis() {
       let me = this;
        let municipi = this.selectComarca;
          axios.get('/municipis/' + municipi).then((response) => {
              me.municipis = response.data;
              console.log(me.municipis);
          })
          .catch((err) => {
              console.log(err);
          })
          .finally(() => (this.loading = false));
    },
    selectTipusIncident() {
        let me = this;
          axios.get('/incidents_types/').then((response) => {
              me.tipusIncidents = response.data;
              console.log(me.tipusIncidents);
          })
          .catch((err) => {
              console.log(err);
          })
          .finally(() => (this.loading = false));
    },
    selectIncidents() {
       let me = this;
        let tipusIncident = this.tipusIncident;
          axios.get('/incidents/' + tipusIncident).then((response) => {
              me.incidents = response.data;
              console.log(me.incidents);
          })
          .catch((err) => {
              console.log(err);
          })
          .finally(() => (this.loading = false));
    },
    currentDateTime(){
        const current = new Date();
        const date = current.getFullYear()+'-'+(current.getMonth()+1)+'-'+current.getDate();
        const time = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
        const dateTime = date +' '+ time;

        trucada.dataCreacio = dateTime;
    },
    insertForm(){

    }
  },
  props:{
      expMsg:{},
      numTelefon: String
  },
  created() {
    this.selectProvincies()
    this.selectMunicipis()
    this.selectTipusIncident()
  },
  mounted() {
    this.$root.$on("CallCardComponent", () => {
      // your code goes here
      this.start();
    });
    this.trucada.phoneInput = this.numTelefon;
    console.log("Component mounted.");
  }
};
</script>
