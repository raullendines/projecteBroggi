<template>
<div class="modal fade" id="modalForm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
            <form action="">
                    <div class="row mb-4">
                        <div class="col">
                            <label for="localitzacio" class="form-label"><vermell>*</vermell>Localització</label>
                            <select v-model="localitzacio" id="localitzacio" name="localitzacio" class="form-select" aria-label="localitzacio">
                                <option selected value="">Selecciona una opció</option>
                                <option value="Catalunya">Catalunya</option>
                                <option value="Altres">Altres</option>
                            </select>
                            <div id="localitzacio" class="form-text">* Comunitat autònoma de l'incident</div>
                        </div>
                    </div>
                    <!-- IF -->
                    <div v-if="localitzacio === 'Catalunya'" class="row mb-4">
                        <div class="col">
                            <label for="procedenciaInput" class="form-label"><vermell>*</vermell>Procedencia</label>
                            <input type="text" class="form-control" name="procedenciaInput" id="procedenciaInput" aria-describedby="procedenciaInput" placeholder="Escriu aquí">
                            <div id="procedenciaInput" class="form-text">* Nacionalitat</div>
                        </div>
                        <div class="col">
                            <label for="comarca" class="form-label"><vermell>*</vermell>Comarca</label>
                            <select id="comarca" name="comarca" class="form-select" aria-label="comarca">
                                <option selected value="">Selecciona una opció</option>
                                <option value="comarca1">Comarca 1</option>
                                <option value="Altres">Altres</option>
                            </select>
                            <div id="comarca" class="form-text">* Comunitat autònoma de l'incident</div>
                        </div>
                        <div class="col">
                            <label for="provincia" class="form-label"><vermell>*</vermell>Provincia</label>
                            <select id="provincia" name="provincia" class="form-select" aria-label="provincia">
                                <option selected value="">Selecciona una opció</option>
                                <option value="provincia1">Provincia 1</option>
                                <option value="Altres">Altres</option>
                            </select>
                            <div id="provincia" class="form-text">* Provincia de l'incident</div>
                        </div>
                        <div class="col">
                            <label for="municipioInput" class="form-label"><vermell>*</vermell>Municipi</label>
                            <input type="text" class="form-control" name="municipioInput" id="municipioInput" aria-describedby="municipioInput" placeholder="Escriu aquí">
                            <div id="municipioInput" class="form-text">* Ciutat de l'incident</div>
                        </div>
                    </div>
                    <!-- ELSE -->
                    <div v-else class="row mb-4">
                        <div class="col">
                            <label for="procedenciaInput" class="form-label"><vermell>*</vermell>Procedencia</label>
                            <input type="text" class="form-control" name="procedenciaInput" id="procedenciaInput" aria-describedby="procedenciaInput" placeholder="Escriu aquí">
                            <div id="procedenciaInput" class="form-text">* Nacionalitat</div>
                        </div>
                        <div class="col">
                            <label for="provincia" class="form-label"><vermell>*</vermell>Provincia</label>
                            <select id="provincia" name="provincia" class="form-select" aria-label="provincia">
                                <option selected value="">Selecciona una opció</option>
                                <option value="provincia1">Provincia 1</option>
                                <option value="Altres">Altres</option>
                            </select>
                            <div id="provincia" class="form-text">* Provincia de l'incident</div>
                        </div>
                        <div class="col">
                            <label for="municipioInput" class="form-label">Municipi</label>
                            <input type="text" class="form-control" name="municipioInput" id="municipioInput" aria-describedby="municipioInput" placeholder="Escriu aquí">
                            <div id="municipioInput" class="form-text">* Ciutat de l'incident</div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <hr>
                    </div>
                    <div v-if="localitzacio === 'Catalunya'" class="row mb-4">
                        <div class="col">
                            <label for="tipusLoc" class="form-label"><vermell>*</vermell>Tipus de localització</label>
                            <select id="tipusLoc" v-model="tipusLocalitzacio" name="tipusLoc" class="form-select" aria-label="tipusLoc">
                                <option selected value="">Selecciona una opció</option>
                                <option value="carrer">Carrer</option>
                                <option value="puntSingular">Punt Singular</option>
                                <option value="carretera">Carretera</option>
                                <option value="entitatPoblacio">Entitat població</option>
                                <option value="provincia">Provincia</option>
                            </select>
                            <div id="provincia" class="form-text">* Tipus de via o lloc on es troba l'incident</div>
                        </div>
                    </div>

                        <div v-if="tipusLocalitzacio === '' && localitzacio === 'Catalunya'">
                                <div class="row mb-4">
                                    <hr>
                                </div>
                        </div>
                        <div v-if="tipusLocalitzacio === 'entitatPoblacio'">
                            <div class="row mb-4">
                            <div class="col">
                            <label class="form-label" for="referenciesLoc">Altres referències de la localització</label>
                            <textarea class="form-control" placeholder="Escriu aquí" name="referenciesLoc" id="referenciesLoc" style="height: 50px"></textarea>
                            <div id="referenciesLoc" class="form-text">* Altres anotacions d'interés sobre la localització</div>
                            </div>
                        </div>
                            <div class="row mb-4">
                                <hr>
                            </div>
                        </div>
                        <div v-if="tipusLocalitzacio === 'provincia'">
                            <div class="row mb-4">
                            <div class="col">
                            <label class="form-label" for="referenciesLoc">Altres referències de la localització</label>
                            <textarea class="form-control" placeholder="Escriu aquí" name="referenciesLoc" id="referenciesLoc" style="height: 50px"></textarea>
                            <div id="referenciesLoc" class="form-text">* Altres anotacions d'interés sobre la localització</div>
                            </div>
                        </div>
                            <div class="row mb-4">
                                <hr>
                            </div>
                        </div>

                        <div v-if="tipusLocalitzacio === 'carrer'">
                            <div class="row mb-4">
                            <div class="col">
                                <label for="tipusVia" class="form-label"><vermell>*</vermell>Tipus de via</label>
                                <select id="tipusVia" name="tipusVia" class="form-select" aria-label="tipusVia">
                                    <option selected value="carrer">Carrer</option>
                                    <option value="avinguda">Avinguda</option>
                                    <option value="bulevar">Bulevar</option>
                                    <option value="carrerPeatonal">Carrer peatonal</option>
                                    <option value="cami">Camí</option>
                                </select>
                                <div id="tipusVia" class="form-text">* Tipus de via de la direcció</div>
                            </div>
                            <div class="col">
                                <label for="nomVia" class="form-label"><vermell>*</vermell>Nom</label>
                                <input type="text" class="form-control" name="nomVia" id="nomVia" aria-describedby="nomVia" placeholder="Escriu aquí">
                                <div id="nomVia" class="form-text">* Nom de la via</div>
                            </div>
                            <div class="col">
                                <label for="numVia" class="form-label"><vermell>*</vermell>Número</label>
                                <input type="number" class="form-control" name="numVia" id="numVia" aria-describedby="numVia" placeholder="Escriu aquí">
                                <div id="numVia" class="form-text">* Número de la via</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="escala" class="form-label">Escala</label>
                                <input type="text" class="form-control" name="escala" id="escala" aria-describedby="escala" placeholder="Escriu aquí">
                                <div id="escala" class="form-text">* Escala ubicada</div>
                            </div>
                            <div class="col">
                                <label for="pis" class="form-label">Pis</label>
                                <input type="number" class="form-control" name="pis" id="pis" aria-describedby="pis" placeholder="Escriu aquí">
                                <div id="pis" class="form-text">* Pis incident</div>
                            </div>
                            <div class="col">
                                <label for="porta" class="form-label">Porta</label>
                                <input type="number" class="form-control" name="porta" id="porta" aria-describedby="porta" placeholder="Escriu aquí">
                                <div id="porta" class="form-text">* Porta incident</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                            <label class="form-label" for="referenciesLoc">Altres referències de la localització</label>
                            <textarea class="form-control" placeholder="Escriu aquí" name="referenciesLoc" id="referenciesLoc" style="height: 50px"></textarea>
                            <div id="referenciesLoc" class="form-text">* Altres anotacions d'interés sobre la localització</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                        <hr>
                    </div>
                    </div>

                    <div v-if="tipusLocalitzacio === 'carretera'">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="nomCarretera" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nomCarretera" id="nomCarretera" aria-describedby="nomCarretera" placeholder="Escriu aquí">
                                <div id="nomCarretera" class="form-text">* Nom de la carretera on hi ha l'incident</div>
                            </div>
                            <div class="col">
                                <label for="puntKilometric" class="form-label">Punt Kilomètric</label>
                                <input type="number" class="form-control" name="puntKilometric" id="puntKilometric" aria-describedby="puntKilometric" placeholder="Escriu aquí">
                                <div id="puntKilometric" class="form-text">* Punt kilomètric de la carretera on hi ha l'incident</div>
                            </div>
                            <div class="col">
                                <label for="sentitCarretera" class="form-label">Sentit</label>
                                <input type="text" class="form-control" name="sentitCarretera" id="sentitCarretera" aria-describedby="sentitCarretera" placeholder="Escriu aquí">
                                <div id="sentitCarretera" class="form-text">* Sentit de la carretera on hi ha l'incident</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                            <label class="form-label" for="referenciesLoc">Altres referències de la localització</label>
                            <textarea class="form-control" placeholder="Escriu aquí" name="referenciesLoc" id="referenciesLoc" style="height: 50px"></textarea>
                            <div id="referenciesLoc" class="form-text">* Altres anotacions d'interés sobre la localització</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                        <hr>
                    </div>
                    </div>

                    <div v-if="tipusLocalitzacio === 'puntSingular'">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="nomPunt" class="form-label"><vermell>*</vermell>Nom</label>
                                <input type="text" class="form-control" name="nomPunt" id="nomPunt" aria-describedby="nomPunt" placeholder="Escriu aquí">
                                <div id="nomPunt" class="form-text">* Nom del punt singular on hi ha l'incident</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                            <label class="form-label" for="referenciesLoc">Altres referències de la localització</label>
                            <textarea class="form-control" placeholder="Escriu aquí" name="referenciesLoc" id="referenciesLoc" style="height: 50px"></textarea>
                            <div id="referenciesLoc" class="form-text">* Altres anotacions d'interés sobre la localització</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                        <hr>
                    </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <label for="tipusIncident" class="form-label"><vermell>*</vermell>Tipus d'incident</label>
                            <select id="tipusIncident" v-model="tipusIncident" name="tipusIncident" class="form-select" aria-label="tipusIncident">
                                <option selected value="">Selecciona una opció</option>
                                <option value="tipusIncident1">Tipus 1</option>
                            </select>
                            <div id="provincia" class="form-text">* Tipus de via o lloc on es troba l'incident</div>
                        </div>
                        <div class="col">
                            <label for="incident" class="form-label"><vermell>*</vermell>Incident</label>
                            <select id="incident" v-model="tipusIncident" name="incident" class="form-select" aria-label="incident">
                                <option selected value="">Selecciona una opció</option>
                                <option value="incident1">Incident 1</option>
                            </select>
                            <div id="provincia" class="form-text">* Tipus de via o lloc on es troba l'incident</div>
                        </div>
                    </div>


                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="antecedents">Antecedents del telèfon</label>
                            <textarea class="form-control" placeholder="Escriu aquí" name="antecedents" id="antecedents" style="height: 60px"></textarea>
                            <div id="antecedents" class="form-text">* Text amb informació rellevant del trucant</div>
                        </div>
                        <div class="col">
                            <label for="phoneInput" class="form-label">Telèfon</label>
                            <div class="input-group">
                                <span class="input-group-text" id="phoneInput">+34</span>
                                <input type="tel" name="phoneInput" placeholder="Escriu aquí" class="form-control" id="phoneInput" aria-describedby="phoneInput">
                            </div>
                            <div id="antecedentsSelect" class="form-text">* Número de telèfon</div>
                        </div>
                        <div class="col">
                            <label for="genereSelect" class="form-label">Gènere</label>
                            <select id="genereSelect" name="genereSelect" class="form-select" aria-label="genereSelect">
                                <option selected>Selecciona una opció</option>
                                <option value="Home">Home</option>
                                <option value="Dona">Dona</option>
                                <option value="Altres">Altres</option>
                            </select>
                            <div id="genereSelect" class="form-text">* Gènere amb el que s'identifica</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label" for="notaComunaInput">Nota comuna</label>
                            <textarea class="form-control" placeholder="Escriu aquí" name="notaComunaInput" id="notaComunaInput" style="height: 100px"></textarea>
                            <div id="notaComunaInput" class="form-text">* Altres anotacions d'interés</div>
                        </div>
                        <div class="col">
                                <label for="vipSelect" class="form-label">VIP</label>
                                <select id="vipSelect" name="vipSelect" class="form-select" aria-label="vipSelect">
                                    <option selected>Selecciona una opció</option>
                                    <option value="vip1">VIP-1</option>
                                    <option value="vip2">VIP-2</option>
                                    <option value="vip3">VIP-3</option>
                                </select>
                                <div id="vipSelect" class="form-text">* VIP predefinits</div>
                        </div>
                    </div>
            </form>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <p class="">Temps de trucada: {{formattedElapsedTime}}</p>
        <div>
            <button type="button" class="btn btn-primary" @click="stop" data-bs-dismiss="modal">Penjar</button>
            <button type="button" class="btn btn-secondary" @click="stop">Guardar i penjar</button>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                elapsedTime:0,
                timer: undefined,
                localitzacio: '',
                tipusLocalitzacio: ''
            };
        },
        computed: {
            formattedElapsedTime() {
                const date = new Date(null);
                date.setSeconds(this.elapsedTime / 1000);
                const utc = date.toUTCString();
                return utc.substr(utc.indexOf(":") - 2, 8);
            }
        },
        methods: {
            start() {
                this.timer = setInterval(() => {
                    this.elapsedTime += 1000;
                }, 1000);
                    },
            stop() {
                clearInterval(this.timer);
                this.elapsedTime = 0;
                    }
        },
            mounted() {
                this.$root.$on('CallCardComponent', () => {
            // your code goes here
            this.start()
            })
                console.log('Component mounted.')
            }
    }

</script>
