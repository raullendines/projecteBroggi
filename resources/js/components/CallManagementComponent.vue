<template>
  <main>
    <h2 class="text-center mt-3">Gestió d'expedients</h2>

    <div class="accordion mt-3 m-auto" id="accordionExample">
      <div class="accordion-item" v-for="exp in expList" :key="exp.id">
        <h2 class="accordion-header" :id="'headingOne' + exp.id">
          <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            :data-bs-target="'#collapseOne' + exp.id"
            :aria-expanded="[exp.id === 1 ? 'true' : 'false']"
            :aria-controls="'collapseOne' + exp.id"
            :style="statusStyles[exp.estat_id -1 ]"
          >
            {{ exp.date_ini }}
          </button>
        </h2>
        <div
          :id="'collapseOne' + exp.id"
          class="accordion-collapse collapse show"
          :aria-labelledby="'headingOne' + exp.id"
          data-bs-parent="#accordionExample"
        >
          <div class="accordion-body">
            <table class="table m-auto mt-3">
              <thead>
                <tr>
                  <th class="col-4">Número tel.</th>
                  <th class="col">Data</th>
                  <th class="col">Temps</th>
                  <th class="col text-end align-middle"></th>
                </tr>
              </thead>
            </table>
            <div v-for="call in calls" :key="call.id">
              <div class="card" v-if="call.id === exp.id">
                <div class="card-body">
                  <table class="table table-borderless mb-0">
                    <tbody>
                      <tr>
                        <th scope="row" class="align-middle col-3">
                          {{ call.tel }}
                        </th>
                        <td class="align-middle col-3">{{ call.date }}</td>
                        <td class="align-middle col-2">{{ call.time }}</td>
                        <td class="text-end col-2">
                          <button
                            type="button"
                            class="btn btn-info"
                            data-bs-toggle="modal"
                            data-bs-target="#modalForm"
                            @click="expAction(call.id, 'ver')"
                          >
                            Ver
                          </button>
                          <button
                            type="button"
                            class="btn btn-info"
                            data-bs-toggle="modal"
                            data-bs-target="#modalForm"
                            @click="expAction(call.id, 'modificar')"
                          >
                            Modificar
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <form-component :expMsg="expItem"></form-component>
  </main>
</template>

<script>
import FormComponent from "./FormComponent.vue";
export default {
  components: { FormComponent },
  data: () => ({
    calls: [
      {
        id: 0,
        tel: "666444545",
        date: "21 Ene 2022",
        time: "12:30:40",
        status: "Process",
        style: "color: #4dc058; background-color : #99FFA2;",
      },
      {
        id: 1,
        tel: "666444535",
        date: "21 Ene 2022",
        time: "12:30:40",
        status: "Resquested",
        style: "color: #4dc058; background-color : #ffeb00;",
      },
      {
        id: 2,
        tel: "666444235",
        date: "21 Ene 2022",
        time: "12:30:40",
        status: "Accepted",
        style: "color: #4dc058; background-color : #6bca33;",
      },
      {
        id: 3,
        tel: "666444335",
        date: "21 Ene 2022",
        time: "12:30:40",
        status: "Closed",
        style: "color: #4dc058; background-color : #129ce0;",
      },
      {
        id: 4,
        tel: "666442335",
        date: "21 Ene 2022",
        time: "12:30:40",
        status: "Inmobilized",
        style: "color: #4dc058; background-color : #a0bafc;",
      },
    ],
    expList: [
      { id: 1, date_ini: "21 Ene 2022", date_mod: "21 Ene 2022", estat_id: 1 },
      { id: 2, date_ini: "21 Ene 2022", date_mod: "21 Ene 2022", estat_id: 2 },
      { id: 3, date_ini: "21 Ene 2022", date_mod: "21 Ene 2022", estat_id: 2 },
    ],
    statusStyles: [
      "background-color : #99FFA2;",
      "background-color : #ffeb00;",
      "background-color : #6bca33;",
      "background-color : #129ce0;",
      "background-color : #a0bafc;",
    ],
    clickedItem: {
      id: "",
      tel: "",
      date: "",
      status: "",
    },
    expItem: {
      id: "",
      msg: "",
    },
    expedientesList: [],
    expedientesStatus: [],
  }),
  methods: {
    expAction(call, e) {
      this.expItem.id = call;
      this.expItem.msg = e;
      return this.expItem;
    },
    selectExpedientes() {
      let me = this;
      axios
        .get("/expedients")
        .then((response) => {
          me.expedientesList = response.data;
          console.log(response);
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    statusExp() {
      let me = this;
      axios.get("/expedients_status").then((response) => {
        me.expedientesStatus = response.data;
        console.log(me.expedientesStatus);
      });
    },
  },
  created() {
    this.selectExpedientes();
    this.statusExp();
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
