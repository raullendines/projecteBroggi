<template>
  <main>
    <table class="table m-auto mt-3" style="width: 80%">
      <thead>
        <tr>
          <th class="col-5">Número tel.</th>
          <th class="col">Data</th>
          <th class="col"></th>
          <th class="col text-end align-middle">Estat</th>
        </tr>
      </thead>
    </table>

  <div class="card mt-3 m-auto" style="width:80%" v-for="call in calls" :key="call.tel">
  <div class="card-body">
    <table class="table table-borderless mb-0">
<tbody>
    <tr>
      <th scope="row" class="align-middle">{{call.tel}}</th>
      <td class="text-center align-middle">{{moment()}}</td>
      <td class="text-end">
          <button type="button" class="btn btn-outline-secondary" v-if="call.status === 'Declined' || call.status === 'Accepted' || call.status === 'Call'" disabled>Aceptar</button>
          <a class="btn btn-outline-secondary modalBtn" id="modalbtn" @click="start(call)" data-bs-toggle='modal' href="#modalForm" v-else >Aceptar</a>
      </td>
      <td class="text-end align-middle">
          <i v-if="call.status === 'Accepted'" :class="status[0].accepted" :style="status[0].style"></i>
          <i v-else-if="call.status === 'Pending'" :class="status[1].pending" :style="status[1].style"></i>
          <i v-else-if="call.status === 'Declined'" :class="status[2].declined" :style="status[2].style"></i>
          <i v-else-if="call.status === 'Call'" :class="status[3].inCall" :style="status[3].style"></i>
        </td>
    </tr>
  </tbody>
</table>
  </div>
</div>

<form-component @status="getStatus" :numTelefon="telefono" :useridm="userid" :codigoTrucada="codiTrucada" v-if="isMounted"></form-component>

</main>
</template>

<script>
import FormComponent from "./FormComponent.vue";
import moment from "moment";
export default {
  components: { FormComponent },
    data: () => ({
        isMounted: false,
        telefono: '',
        userid: '',
        codiTrucada: -1,
        calls: [
            {
                tel: "666444545",
                status: "Accepted"
            },
            {
                tel: "666444555",
                status: "Pending"
            },
            {
                tel: "666444535",
                status: "Declined"
            },
            {
                tel: "666444435",
                status: "Call"
            },
        ],
        status: [
            {accepted: "fa fa-check-circle fa-lg",
            style: "color: #4dc058;"
            },
            {pending: "fas fa-clock fa-lg",
            style: "color: #f1ab31;"
            },
            {declined: "fa fa-times-circle fa-lg",
            style: "color: #c90175;"
            },
            {inCall: "fas fa-phone fa-lg",
            style: "color: #02afc8;"
            },
        ],
        clickedItem:{
            tel:'',
            date:'',
            status:''
        },
        currentdate:{},
            modal: '',
            modalHref: ''
    }),
    methods:{
        codiTrucadaInsert(){
        let me = this;
        axios
        .post('/codi_trucada')
            .then(function(response){
                console.log("EL RESPONSE DEL CODI DE TRUCADA ---> ");
                me.codiTrucada = response.data.id;
            }).catch(function(error){
                console.log(error.response);
            });
    },
        start(call){
            let me = this;
            me.$root.$emit('CallCardComponent');
            me.clickedItem = call;
            me.codiTrucadaInsert();
            me.clickedItem.status = me.clickedItem.status.replace(me.clickedItem.status, "Call");
            me.telefono = call.tel;
        },
        getStatus(status) {
            console.log(status);
            this.clickedItem.status = this.clickedItem.status.replace(this.clickedItem.status, status);
        },
        moment: function () {
            moment.locale('es');
            this.currentdate = moment(new Date()).format('DD MMM YYYY').toUpperCase().replace('.', '');
            return this.currentdate;
        },
  },
  mounted() {
    console.log("Component mounted.");
    this.userid = parseInt(this.$attrs['userid']);
    this.isMounted = true;
  },
};
</script>
