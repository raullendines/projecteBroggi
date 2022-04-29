<template>
    <canvas id="pie-chart" width="300" height="300"></canvas> 
</template>

<script>

export default {
  data() {
    return {
      datosPie: {
        labels: [],
        datasets: [
          {
            label: "Numero de trucades per tipus d'incident",
            data: [],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
                
            ],            
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
                
            ],
          }
        ]
      }
    }
  },
  methods: {
   selectLamadasContador() {
      let me = this;
        axios.get('/contador/').then((response) => {
            me.llamada = response.data;
            this.selectEachLlamadaContador();

})
        .catch((err) => {
            console.log(err);
        })
        .finally(() => (this.loading = false));
    }, 
    selectEachLlamadaContador(){
      for (const call of this.llamada) {
        this.datosPie.labels.push(call.descripcio);
        this.datosPie.datasets[0].data.push(call.Contador);
      }
      this.pieChart();
    },

    pieChart(){
      const ctx = document.getElementById('pie-chart');
      const stackedBar = new Chart(ctx, {
          type: 'doughnut',
          data: this.datosPie,
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
      })
    }
  },
  created(){
    this.selectLamadasContador();
  }
}
</script>
