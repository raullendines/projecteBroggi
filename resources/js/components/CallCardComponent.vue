<template>
<main>
    <table class="table m-auto" style="width:80%">
  <thead>
    <tr>
      <th class="col-5" >Número tel.</th>
      <th class="col">Data</th>
      <th class="col"></th>
      <th class="col text-end align-middle" >Estat</th>
    </tr>
  </thead>
  </table>

  <div class="card mt-3 m-auto" style="width:80%" v-for="call in calls" :key="call.tel">
  <div class="card-body">
    <table class="table table-borderless mb-0">
<tbody>
    <tr>
      <th scope="row" class="align-middle">{{call.tel}}</th>
      <td class="text-center align-middle">{{call.date}}</td>
      <td class="text-end">
          <button type="button" class="btn btn-outline-secondary" v-if="call.status === 'Declined' || call.status === 'Active'" disabled>Aceptar</button>
          <button type="button" class="btn btn-outline-secondary" v-else>Aceptar</button>
      </td>
      <td class="text-end align-middle">
          <i v-if="call.status === 'Active'" :class="status[0].active" :style="status[0].style"></i>
          <i v-else-if="call.status === 'Pending'" :class="status[1].pending" :style="status[1].style"></i>
          <i v-else-if="call.status === 'Declined'" :class="status[2].declined" :style="status[2].style"></i>
        </td>
    </tr>
  </tbody>
</table>
  </div>
</div>
</main>
</template>

<script>
export default {
    data: () => ({
        calls: [
            {
                tel: "666444545",
                date: "21 Ene 2022",
                status: "Active"
            },
            {
                tel: "666444555",
                date: "21 Ene 2022",
                status: "Pending"
            },
            {
                tel: "666444535",
                date: "21 Ene 2022",
                status: "Declined"
            },
        ],
        status: [
            {active: "fa fa-check-circle fa-lg",
            style: "color: #4dc058;"
            },
            {pending: "fas fa-clock fa-lg",
            style: "color: #f1ab31;"
            },
            {declined: "fa fa-times-circle fa-lg",
            style: "color: #c90175;"
            },
        ],
    }),
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
