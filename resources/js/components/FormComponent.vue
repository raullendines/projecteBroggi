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
                            <input type="text" class="form-control" id="procedenciaInput" aria-describedby="procedenciaInput" placeholder="Escriu aquí">
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
                            <input type="text" class="form-control" id="municipioInput" aria-describedby="municipioInput" placeholder="Escriu aquí">
                            <div id="municipioInput" class="form-text">* Ciutat de l'incident</div>
                        </div>
                    </div>
                    <!-- ELSE -->
                    <div v-else class="row mb-4">
                        <div class="col">
                            <label for="procedenciaInput" class="form-label"><vermell>*</vermell>Procedencia</label>
                            <input type="text" class="form-control" id="procedenciaInput" aria-describedby="procedenciaInput" placeholder="Escriu aquí">
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
                            <input type="text" class="form-control" id="municipioInput" aria-describedby="municipioInput" placeholder="Escriu aquí">
                            <div id="municipioInput" class="form-text">* Ciutat de l'incident</div>
                        </div>
                    </div>

                    <div class="row mb-4">
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
                            <div id="provincia" class="form-text">* Provincia de l'incident</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="antecedents">Antecedents del telèfon</label>
                            <textarea class="form-control" placeholder="Escriu aquí" id="antecedents" style="height: 60px"></textarea>
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
                            <textarea class="form-control" placeholder="Escriu aquí" id="notaComunaInput" style="height: 100px"></textarea>
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
