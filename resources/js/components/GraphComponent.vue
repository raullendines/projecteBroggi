<template>
  <div class="px-5 m-auto mt-5">
    <div class="row">
      <div class="col-5 offset-md-1">
        <linear-component></linear-component>
      </div>
      <div class="col-5">
        <div class="card mt-4 opacity-75">
          <div class="card-header"> <b>Grafic de número de trucades per comarca</b> </div>
          <div class="card-body">
            <p class="card-text">
              Gràfic que dona a coneixer la densitat d'incidents que hi ha per comarca basant-se en el numero de trucades rebudes en cada territori català.
            </p>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-5 offset-md-1">
        <div class="card mt-4 opacity-75">
          <div class="card-header">Grafic de número de trucades per tipus d'incident</div>
          <div class="card-body">
            <p class="card-text">
              Aquest grafic mostra el numero de trucades que es reben per tipus d'incident causat dins del nostre territori. <br>
              Aquest gràfic serveix per donar a coneixer quins tipus d'incidents son els que mes patim i aixi poder concienciar als ciutadans.
            </p>
          </div>
        </div>
    </div>
      <div class="col-5">
        <pie-component></pie-component>
      </div>
    </div>
  </div>

  </div>
</template>
