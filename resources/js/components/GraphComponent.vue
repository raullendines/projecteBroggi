<template>
<div>
<div class="row mt-3 align-center"> <h5> <b> Numero de trucades per tipus d'accident</b></h5>  </div>
<div v-if="this.chartData.datasets[0].data.length > 0" class="row">
  <Bar
    :chart-options="chartOptions"
    :chart-data="chartData"
    :chart-id="chartId"
    :dataset-id-key="datasetIdKey"
    :plugins="plugins"
    :css-classes="cssClasses"
    :styles="styles"
    :width="width"
    :height="height"
  />
</div>
</div>
</template>

<script>
import { Bar } from 'vue-chartjs/legacy'

import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'BarChart',
  components: {
    Bar
  },
  props: {
    chartId: {
      type: String,
      default: 'bar-chart'
    },
    datasetIdKey: {
      type: String,
      default: 'label'
    },
    width: {
      type: Number,
      default: 400
    },
    height: {
      type: Number,
      default: 400
    },
    cssClasses: {
      default: '',
      type: String
    },
    styles: {
      type: Object,
      default: () => {}
    },
    plugins: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      llamada: [],
      incidentes: [],
      chartData: {
        labels: [],
        datasets: [
          {
            label: 'Numero de trucades',
            backgroundColor: '#00AFC8',
            data: []
          }
        ]
      },
      chartOptions: {
        responsive: true,
        maintainAspectRatio: false
      }
    }
  },
  methods: {
   selectLamadas() {
     console.log("ha entrado");
      let me = this;
        axios.get('/contador/').then((response) => {
            me.llamada = response.data;
            this.selectEachLlamada();
        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => (this.loading = false));
    }, 
    selectEachLlamada(){
      for (const call of this.llamada) {
        this.chartData.labels.push(call.descripcio);
        this.chartData.datasets[0].data.push(call.Contador);
        console.log(this.chartData.labels);
        console.log(this.chartData.datasets[0].data );
      }
    },
    selectIncidentsTypes() {
      let me = this;
        axios.get('/incidents_types/1').then((response) => {
            me.chartData.labels = response.data;
        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    /* bucle(){
      let me = this;
      for (const numero of me.chartData.labels) {
        let num = numero.id
        this.selectIncidents(num);
      }
        
    }, */
    /* selectIncidents(num) {
      let me = this;
        axios.get('/incidents/' + num).then((response) => {
            me.incidentes = response.data;
            this.countTelefonos();
         })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => (this.loading = false));
        
    },
     countTelefonos(){
       console.log(this.incidentes);
     } */
  },
  created(){
    /* this.selectLamadas(); */
    this.selectLamadas();
    /* this.selectIncidents(); */
  }
}
</script>
