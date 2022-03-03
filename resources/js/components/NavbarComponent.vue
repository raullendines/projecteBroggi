<template>
  <nav
    class="
      navbar navbar-expand-lg navbar-light
      bg-light
      shadow
      p-3
      mb-5
      rounded
    "
  >
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img
          src=""
          alt=""
          width="30"
          height="24"
          class="d-inline-block align-text-top ml-3"
        />
        Broggi</a
      >

      <div class="d-flex" id="navbarNavDropdown">
        <ul class="navbar-nav d-flex flex-row"> <!--  v-if="isAdmin" -->
          <li class="nav-item" v-for="item in adminItems" :key="item.url">
            <a
              class="btn btn-sm nav-link active"
              :style="item.style"
              aria-current="page"
              :href="item.url"
              role="button"
            >
              <i :class="item.icon"></i>
              {{ item.name }}
            </a>
          </li>
        </ul>
<!--
        <ul class="navbar-nav d-flex flex-row" v-if="isSupervisor">
          <li class="nav-item" v-for="item in supervisorItems" :key="item.url">
            <a
              class="btn btn-sm nav-link active"
              :style="item.style"
              aria-current="page"
              :href="item.url"
              role="button"
            >
              <i :class="item.icon"></i>
              {{ item.name }}
            </a>
          </li>
        </ul>

        <ul class="navbar-nav d-flex flex-row" v-if="isOperator">
          <li class="nav-item" v-for="item in operatorItems" :key="item.url">
            <a
              class="btn btn-sm nav-link active"
              :style="item.style"
              aria-current="page"
              :href="item.url"
              role="button"
            >
              <i :class="item.icon"></i>
              {{ item.name }}
            </a>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>
</template>

<script>

export default {
  data: () => ({
    adminItems: [
      {
        name: "Gestion de expedientes",
        url: "/expedients",
        icon: "fas fa-file-alt",
        style:
          "background-color:#02AFC8; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Mapa",
        url: "/map",
        icon: "fas fa-map-marker-alt",
        style:
          "background-color:#F2AB31; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Grafico",
        url: "/graph",
        icon: "fas fa-chart-line",
        style:
          "background-color:#4FBF58; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Salir",
        url: "/logout",
        icon: "fas fa-sign-out-alt",
        style: "background-color:#C90175; color:white",
      },
    ],
    operatorItems: [
      {
        name: "Salir",
        url: "/logout",
        icon: "fas fa-sign-out-alt",
        style: "background-color:#C90175; color:white",
      },
    ],
    supervisorItems: [
      {
        name: "Gestion de expedientes",
        url: "/expedients",
        icon: "fas fa-file-alt",
        style:
          "background-color:#02AFC8; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Salir",
        url: "/logout",
        icon: "fas fa-sign-out-alt",
        style: "background-color:#C90175; color:white",
      },
    ],
  }),
/*   computed: {
    ...mapGetters("user", ["isAdmin", "isOperator", "isSupervisor"]),
  }, */
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
