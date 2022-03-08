<template>
  <div class="container-fluid mt-2">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#tel</th>
              <th scope="col">Data</th>
              <th scope="col"></th>
              <th scope="col">Estat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td><button type="button" class="btn btn-primary" style="">Aceptar</button></td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data: () => ({
        
    }),
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
