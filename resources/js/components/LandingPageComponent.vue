<template>
  <div class="container mt-3 d-flex align-items-center h-100">
<!-- <div class="card w-50 m-auto">
  <div class="card-header">
    welcome
  </div>
  <div class="card-body" v-for="user in userInfo" :key="user.id">
    <blockquote class="blockquote mb-0" >
        <h1>Hola {{user.nom}} {{user.cognoms}},</h1>
        <h5 v-if="user.rols_id === 3"> Ets un Administrador</h5>
        <h5 v-else-if="user.rols_id === 2">Ets un Supervisor</h5>
        <h5 v-else>Ets un Operador</h5>
      <p>Y tens aquest permisos:</p>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div> -->
 <div v-for="user in userInfo" :key="user.id">
    <blockquote class="blockquote mb-0" >
        <h1>Hola {{user.nom}} {{user.cognoms}},</h1>
        <h5 v-if="user.rols_id === 3"> Ets un Administrador</h5>
        <h5 v-else-if="user.rols_id === 2">Ets un Supervisor</h5>
        <h5 v-else>Ets un Operador</h5>
<!--         <p> Tens permis per gestionar: <br>
            <a :href="url + 'trucades'">les cartes de trucades</a>, <br>
            <a :href="url + 'expedients'">els expedients</a>, <br>
            <a :href="url + 'map'">el mapa</a>, <br>
            <a :href="url + 'graph'">el gràfic</a>,<br>
            <a :href="url + 'admin'">administrar usuaris</a> </p> -->
    </blockquote>
  </div>
  </div>
</template>


<script>
export default {
  data: () => ({
    userInfo:[],
    url: "/projecteBroggi/public/",
  }),
  mounted() {
      this.userInfo.push(JSON.parse(this.$attrs['userinfo']))
  }
};
</script>
