<template>
  <div>
    <nav
      class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 rounded"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="/projecteBroggi/public/">
          <img
            src="images/broggi_logo.png"
            alt="logo broggi"
            class="d-inline-block align-text-top ml-3"
            style="width: 7em"
          />
        </a>

        <div
          class="d-flex"
          id="navbarNavDropdown"
          v-for="profile in profiles"
          :key="profile.id"
        >
          <ul class="navbar-nav d-flex flex-row" v-if="profile.id === 3">
            <li
              class="nav-item"
              v-for="(item, i) in adminItems"
              :key="item.url"
            >
              <a
                class="btn btn-sm nav-link active"
                :class="
                  currentHref === 'http://localhost' + item.url
                    ? 'btn-primary'
                    : 'btn-outline-primary'
                "
                aria-current="page"
                :href="item.url"
                role="button"
                :id="
                  currentHref == 'http://localhost' + item.url
                    ? 'tab' + i
                    : 'tabOutline' + i
                "
              >
                <i :class="item.icon"></i> &nbsp;
                {{ item.name }}
              </a>
            </li>
          </ul>


          <ul class="navbar-nav d-flex flex-row" v-if="profile.id === 2">
            <li
              class="nav-item"
              v-for="(item, i) in supervisorItems"
              :key="item.url"
            >
              <a
                class="btn btn-sm nav-link active"
                :class="
                  currentHref === 'http://localhost' + item.url
                    ? 'btn-primary'
                    : 'btn-outline-primary'
                "
                aria-current="page"
                :href="item.url"
                role="button"
                :id="
                  currentHref == 'http://localhost' + item.url
                    ? 'tab' + i
                    : 'tabOutline' + i
                "
              >
                <i :class="item.icon"></i> &nbsp;
                {{ item.name }}
              </a>
            </li>
          </ul>

          <ul class="navbar-nav d-flex flex-row" v-if="profile.id === 1">
            <li
              class="nav-item"
              v-for="(item, i) in operatorItems"
              :key="item.url"
            >
              <a
                class="btn btn-sm nav-link active"
                :class="
                  currentHref === 'http://localhost' + item.url
                    ? 'btn-primary'
                    : 'btn-outline-primary'
                "
                aria-current="page"
                :href="item.url"
                role="button"
                :id="
                  currentHref == 'http://localhost' + item.url
                    ? 'tab' + i
                    : 'tabOutline' + i
                "
              >
                <i :class="item.icon"></i> &nbsp;
                {{ item.name }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<style>
#tabOutline0 {
  color: black;
  background-color: transparent !important;
  border-color: #fca3cb !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline0:hover {
  color: white !important;
  background-color: #f90173 !important;
  border-color: #fca3cb !important;
}

#tab0 {
  color: white !important;
  background-color: #f90173 !important;
  border-color: #fca3cb !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline1 {
  color: black;
  border-color: #00b0c8 !important;
  background-color: transparent !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline1:hover {
  color: white !important;
  background-color: #00b0c8 !important;
  border-color: #00b0c8 !important;
}

#tab1 {
  color: white !important;
  background-color: #00b0c8 !important;
  border-color: #00b0c8 !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline2 {
  color: black;
  border-color: #3f51b5 !important;
  background-color: transparent !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline2:hover {
  color: white !important;
  background-color: #3f51b5 !important;
  border-color: #3f51b5 !important;
}

#tab2 {
  color: white !important;
  background-color: #3f51b5 !important;
  border-color: #3f51b5 !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline3 {
  color: black;
  border-color: #4fbf58 !important;
  background-color: transparent !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline3:hover {
  color: white !important;
  background-color: #4fbf58 !important;
  border-color: #4fbf58 !important;
}

#tab3 {
  color: white !important;
  background-color: #4fbf58 !important;
  border-color: #4fbf58 !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline4 {
  color: black;
  border-color: #f2ab31 !important;
  background-color: transparent !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline4:hover {
  color: white !important;
  background-color: #f2ab31 !important;
  border-color: #f2ab31 !important;
}

#tab4 {
  color: white !important;
  background-color: #f2ab31 !important;
  border-color: #f2ab31 !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline5 {
  color: black;
  border-color: #ff5722 !important;
  background-color: transparent !important;
  margin-right: 10px;
  padding: 7.5px;
}

#tabOutline5:hover {
  color: white !important;
  background-color: #ff5722 !important;
  border-color: #ff5722 !important;
}

#tab5 {
  color: white !important;
  background-color: #ff5722 !important;
  border-color: #ff5722 !important;
  margin-right: 10px;
  padding: 7.5px;
}
</style>

<script>
export default {
  data() {
    return {
      currentHref: window.location.href,
      adminItems: [
        {
          name: "Cartes de trucades",
          url: "/projecteBroggi/public/trucades",
          icon: "fas fa-headset",
        },
        {
          name: "Gestió d'expedients",
          url: "/projecteBroggi/public/expedients",
          icon: "fas fa-file-alt",
        },
        {
          name: "Mapa",
          url: "/projecteBroggi/public/mapa",
          icon: "fas fa-map-marker-alt",
        },
        {
          name: "Gràfic",
          url: "/projecteBroggi/public/grafic",
          icon: "fas fa-chart-line",
        },
        {
          name: "Admin",
          url: "/projecteBroggi/public/admin",
          icon: "fas fa-user-cog",
        },
        {
          name: "Sortir",
          url: "/projecteBroggi/public/logout",
          icon: "fas fa-sign-out-alt",
        },
      ],
      operatorItems: [
        {
          name: "Cartes de trucades",
          url: "/projecteBroggi/public/trucades",
          icon: "fas fa-headset",
        },
        {
          name: "Sortir",
          url: "/projecteBroggi/public/logout",
          icon: "fas fa-sign-out-alt",
        },
      ],
      supervisorItems: [
        {
          name: "Cartes de trucades",
          url: "/projecteBroggi/public/trucades",
          icon: "fas fa-headset",
        },
        {
          name: "Gestió d'expedients",
          url: "/projecteBroggi/public/expedients",
          icon: "fas fa-file-alt",
        },
        {
          name: "Sortir",
          url: "/projecteBroggi/public/logout",
          icon: "fas fa-sign-out-alt",
        },
      ],
      profiles: [],
      userId: {},
    };
  },
  methods: {
    selectProfiles() {
      let me = this;
      this.userId = this.$attrs["userid"];
      axios
        .get("/perfils/" + me.userId)
        .then((response) => {
          me.profiles = response.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    isActive() {},
  },
  created() {
    this.selectProfiles();
  },
  mounted() {
  },
};
</script>
