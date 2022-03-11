<template>
<div class="modal fade" id="modalForm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
            <form action="">
                    <div class="row mb-5">
                        <div class="col">
                            <label for="procedenciaInput" class="form-label">Procedencia</label>
                            <input type="text" class="form-control" id="procedenciaInput" aria-describedby="procedenciaInput" placeholder="Escriu aquí">
                            <div id="procedenciaInput" class="form-text">* Nacionalitat</div>
                        </div>
                        <div class="col">
                            <label for="municipioInput" class="form-label">Municipi</label>
                            <input type="text" class="form-control" id="municipioInput" aria-describedby="municipioInput" placeholder="Escriu aquí">
                            <div id="municipioInput" class="form-text">* Ciutat de l'incident</div>
                        </div>
                        <div class="col">
                            <label for="direccionInput" class="form-label">Direcció</label>
                            <input type="text" class="form-control" id="direccionInput" aria-describedby="direccionInput" placeholder="Escriu aquí">
                            <div id="direccionInput" class="form-text">* Direcció postal de l'incident</div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col">
                            <label for="antecedentsSelect" class="form-label">Antecedents</label>
                            <select id="antecedentsSelect" name="antecedentsSelect" class="form-select" aria-label="selectAntecedentes">
                                <option selected>Selecciona una opció</option>
                                <option value="0">Si</option>
                                <option value="1">No</option>
                            </select>
                            <div id="antecedentsSelect" class="form-text">* Trucades anteriors</div>
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
                    <div class="row mb-5">
                        <div class="col">
                            <label class="form-label" for="notaComunaInput">Nota comuna</label>
                            <textarea class="form-control" placeholder="Escriu aquí" id="notaComunaInput" style="height: 100px"></textarea>
                            <div id="genereSelect" class="form-text">* Altres anotacions d'interés</div>
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
      <div class="modal-footer">
        <p>{{formattedElapsedTime}}</p>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Penjar</button>
        <button type="button" class="btn btn-secondary">Guardar i penjar</button>
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
                timer: undefined
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
                    }
        },
            mounted() {
                console.log('Component mounted.')
            }
    }

</script>
