<template>
  <canvas id="line-chart" width="300" height="300"></canvas> 
</template>

<script>

export default {
  data() {
    return {
      datosLine: {
        labels: [],
        datasets: [
          {
            label: "Numero de trucades per comarca",
            data: [],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],            
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
          }
        ]
      }
    }
  },
  methods: {
    selectLamadasComarca() {
     console.log("ha entrado");
      let me = this;
        axios.get('/comarca/').then((response) => {
            me.llamada = response.data;
            console.log(me.llamada);
            this.selectEachLlamadaComarca();

        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => (this.loading = false));
    }, 

    selectEachLlamadaComarca(){
      for (const call of this.llamada) {
        this.datosLine.labels.push(call.nom);
        this.datosLine.datasets[0].data.push(call.contador);
      }
      this.lineChart();
    },

      lineChart(){
      const ctx = document.getElementById('line-chart');
      const stackedLine = new Chart(ctx, {
          type: 'bar',
          data: this.datosLine,
          options: {
              scales: {
                  x: {
                      stacked: true
                  },
                  y: {
                      stacked: true
                  }
              }
          }
      });
      
    }
  },
  created(){
    this.selectLamadasComarca();
  }
}
</script>
