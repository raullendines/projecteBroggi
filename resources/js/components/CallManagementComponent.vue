<template>
<main>
    <h2 class="text-center mt-3">Gestió d'expedients</h2>
    <table class="table m-auto mt-3" style="width:80%">
  <thead>
    <tr>
      <th class="col-4" >Número tel.</th>
      <th class="col">Data</th>
      <th class="col">Temps</th>
      <th class="col text-end align-middle"></th>
    </tr>
  </thead>
  </table>

  <div class="card mt-3 m-auto" style="width:80%" v-for="call in calls" :key="call.tel">
  <div class="card-body" :style="call.style">
    <table class="table table-borderless mb-0">
<tbody>
    <tr>
      <th scope="row" class="align-middle col-3">{{call.tel}}</th>
      <td class="align-middle col-3">{{call.date}}</td>
      <td class="align-middle col-2">{{call.time}}</td>
      <td class="text-end col-2">
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalForm">Ver</button>
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalForm">Modificar</button>
      </td>
    </tr>
  </tbody>
</table>
  </div>
</div>

<form-component></form-component>

</main>
</template>

<script>
import FormComponent from './FormComponent.vue';
export default {
  components: { FormComponent },
    data: () => ({
        calls: [
            {
                tel: "666444545",
                date: "21 Ene 2022",
                time: "12:30:40",
                status: "Process",
                style: "color: #4dc058; background-color : #99FFA2;"
            },
            {
                tel: "666444535",
                date: "21 Ene 2022",
                time: "12:30:40",
                status: "Resquested",
                style: "color: #4dc058; background-color : #ffeb00;"
            },
            {
                tel: "666444435",
                date: "21 Ene 2022",
                time: "12:30:40",
                status: "Accepted",
                style: "color: #4dc058; background-color : #6bca33;"
            },
            {
                tel: "666444335",
                date: "21 Ene 2022",
                time: "12:30:40",
                status: "Closed",
                style: "color: #4dc058; background-color : #129ce0;"
            },
            {
                tel: "666442335",
                date: "21 Ene 2022",
                time: "12:30:40",
                status: "Inmobilized",
                style: "color: #4dc058; background-color : #a0bafc;"
            },
        ],
    }),
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
