<template>
<div>
<br />
  <div style="display: flex; justify-content: center">
    <h5>
      No puedes entrar ahi, ¿quieres
<!--       <a href="{{ route('logout') }}">iniciar sesión</a> con otro usuario?
 -->    </h5>
  </div>

  <br />

  <div style="display: flex; justify-content: center">
  <!--   <img
      src="{{ asset('images/perro-triste-p.jpeg') }}"
      alt="error"
      style="width: 600px"
    /> -->
  </div>
</div>
  
</template>

<script>
export default {
  data() {
    return {
      perro: []
    };
  },
  methods: {
    selectPerro() {
      let me = this;
      axios
        .get("http://dog.ceo/api/breeds/image/random")
        .then((response) => {
          me.perro = response.data;
          console.log(this.perro)
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
  },
  created() {
    this.selectPerro();
  },
};
</script>
