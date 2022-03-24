<template>
  <nav
    class="
      navbar navbar-expand-lg navbar-light
      bg-light
      shadow
      p-3
      rounded
    "
  >
    <div class="container-fluid">
      <a class="navbar-brand" href="/projecteBroggi/public/">
        <img
          src="images/broggi_logo.png"
          alt="logo broggi"
          class="d-inline-block align-text-top ml-3"
          style="width: 7em;"
        />
        </a>

      <div class="d-flex" id="navbarNavDropdown" v-for="profile in profiles" :key="profile.id">
        <ul class="navbar-nav d-flex flex-row" v-if="profile.id === 3">
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

        <ul class="navbar-nav d-flex flex-row" v-if="profile.id === 2">
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

        <ul class="navbar-nav d-flex flex-row" v-if="profile.id === 1">
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
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>

export default {
  data: () => ({
    adminItems: [
      {
        name: "Carta de trucades",
        url: "/projecteBroggi/public/trucades",
        icon: "fas fa-headset",
        style:
          "background-color:#C90175; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Gestió d'expedients",
        url: "/projecteBroggi/public/expedients",
        icon: "fas fa-file-alt",
        style:
          "background-color:#02AFC8; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Mapa",
        url: "/projecteBroggi/public/map",
        icon: "fas fa-map-marker-alt",
        style:
          "background-color:#F2AB31; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Gràfic",
        url: "/projecteBroggi/public/graph",
        icon: "fas fa-chart-line",
        style:
          "background-color:#4FBF58; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Admin",
        url: "/projecteBroggi/public/admin",
        icon: "fas fa-user-cog",
        style: "background-color:#FF005D; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Sortir",
        url: "/projecteBroggi/public/logout",
        icon: "fas fa-sign-out-alt",
        style: "background-color:#FF005D; color:white",
      },
    ],
    operatorItems: [
        {
        name: "Carta de trucades",
        url: "/projecteBroggi/public/trucades",
        icon: "fas fa-headset",
        style:
          "background-color:#C90175; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Sortir",
        url: "/projecteBroggi/public/logout",
        icon: "fas fa-sign-out-alt",
        style: "background-color:#FF005D; color:white",
      },
    ],
    supervisorItems: [
        {
        name: "Carta de trucades",
        url: "/projecteBroggi/public/trucades",
        icon: "fas fa-headset",
        style:
          "background-color:#C90175; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Gestió d'expedients",
        url: "/projecteBroggi/public/expedients",
        icon: "fas fa-file-alt",
        style:
          "background-color:#02AFC8; color:white; margin-right:10px; padding: 7.5px;",
      },
      {
        name: "Sortir",
        url: "/projecteBroggi/public/logout",
        icon: "fas fa-sign-out-alt",
        style: "background-color:#FF005D; color:white",
      },
    ],
    profiles: [],
    userId:{},
  }),
  methods: {
      selectProfiles () {
          let me = this;
          this.userId = this.$attrs['userid'];
          axios.get('/perfils/' + me.userId).then((response) => {
              me.profiles = response.data;
              console.log(response);
          })
          .catch((err) => {
              console.log(err);
          })
          .finally(() => (this.loading = false));
      },
  },
  created() {
    this.selectProfiles();
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
