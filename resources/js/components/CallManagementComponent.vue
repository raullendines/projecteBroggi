<template>
  <main>
    <h2 class="text-center mt-3">Gestió d'expedients</h2>

    <div class="accordion mt-3 m-auto" id="accordionExample">
      <div
        class="accordion-item"
        v-for="(exp, i) in expedientesList"
        :key="exp.id"
      >
        <h2 class="accordion-header" :id="'heading' + exp.id">
          <button
            class="accordion-button"
            :class="i > 0 ? 'collapsed' : ''"
            type="button"
            data-bs-toggle="collapse"
            :data-bs-target="'#collapse' + exp.id"
            :aria-expanded="i === 0 ? true : false"
            :aria-controls="'collapse' + exp.id"
          >
            {{ exp.formatTime }} &nbsp;
            <i
              class="fas fa-circle"
              :style="statusStyles[exp.estats_expedients_id - 1]"
            ></i>
          </button>
        </h2>
        <div
          :id="'collapse' + exp.id"
          class="accordion-collapse collapse"
          :class="i != 0 ? 'show' : ''"
          :aria-labelledby="'heading' + exp.id"
          data-bs-parent="#accordionExample"
        >
          <div class="accordion-body">
            <table class="table m-auto mt-3">
              <thead>
                <tr>
                  <th class="col-4">Número tel.</th>
                  <th class="col">Data i Hora</th>
                  <th class="col text-end align-middle"></th>
                </tr>
              </thead>
            </table>
            <div v-for="call in callLists" :key="call.id">
              <div class="card" v-if="call.expedients_id === exp.id">
                <div class="card-body">
                  <table class="table table-borderless mb-0">
                    <tbody>
                      <tr>
                        <th scope="row" class="align-middle col-2">
                          {{ call.telefon }}
                        </th>
                        <td class="align-middle col-2">{{ call.data_hora }}</td>
                        <td class="text-end col-2">
                          <button
                            type="button"
                            class="btn btn-outline-info"
                            @click="expAction(call, 'ver', exp.estats_expedients_id, exp.id)"
                            data-bs-toggle="modal"
                            data-bs-target="#modalFormManagement"
                          >
                            Ver
                          </button>
                          <button
                            type="button"
                            class="btn btn-outline-warning"
                            @click="expAction(call, 'modificar', exp.estats_expedients_id, exp.id)"
                            data-bs-toggle="modal"
                            data-bs-target="#modalFormManagement"
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

    <managementForm-component
      :expMsg="expItem"
      v-if="isMounted"
      :statusList="expedientesStatus"
    ></managementForm-component>
  </main>
</template>

<script>
import ManagementFormComponent from "./ManagementFormComponent.vue";
import moment from "moment";
export default {
  components: { ManagementFormComponent },
  data: () => ({
    isMounted: false,
    statusStyles: [
      "color : #4FBF58;", //proces verd
      "color : #FDFD96;", //solicitat groc
      "color : #556b2e;", //acceptat verd oliva
      "color : #bae1ff;", //tancat blau
      "color : #cbbad4;", //inmobilitzat lila
    ],
    expItem: {
      call: [],
      msg: "",
      status: 0,
      statusId:0,
    },
    expedientesList: [],
    expedientesStatus: [],
    callLists: [],
    formatDate: "",
    collapsed: "",
    addItem: {},
    addExp: {},
  }),
  methods: {
    expAction(call, e, s, id) {
      let me = this;
      me.expItem.call = call;
      me.expItem.msg = e;
      me.expItem.status = s;
      me.expItem.statusId = id;
      this.start();
      return this.expItem;
    },
    selectExpedientes() {
      let me = this;
      axios
        .get("/expedients")
        .then((response) => {
          me.expedientesList = response.data;
          me.moment();
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
      this.selectCallCard();
    },
    statusExp() {
      let me = this;
      axios.get("/expedients_status").then((response) => {
        me.expedientesStatus = response.data;
      });
    },
    selectCallCard() {
      let me = this;
      axios
        .get("/callCards2")
        .then((response) => {
          me.callLists = response.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    moment() {
      let me = this;
      moment.locale("es");
      /* for (let i = 0; i < me.callLists.length; i++) {
          const formatTime = moment(me.callLists[i].data_hora).format("DD MMM YYYY")
        .toUpperCase()
        .replace(".", "");
       console.log(formatTime);
       me.callLists[i] = Object.assign({}, me.callLists[i], {
           formatTime: formatTime
       })
      } */

      for (let i = 0; i < me.expedientesList.length; i++) {
        const formatTime = moment(me.expedientesList[i].data_creacio)
          .format("DD MMM YYYY")
          .toUpperCase()
          .replace(".", "");
        me.expedientesList[i] = Object.assign({}, me.expedientesList[i], {
          formatTime: formatTime,
        });
      }
    },
    start() {
      let me = this;
      me.$root.$emit("CallManagementComponent");
    },
  },
  created() {
    this.selectExpedientes();
    this.statusExp();
  },
  mounted() {
    this.isMounted = true;
  },
};
</script>
