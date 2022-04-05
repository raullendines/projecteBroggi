<template>
  <main class="m-auto mt-3">
    <v-app id="inspire">
      <v-card-title>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>

      <v-data-table
        :headers="headers"
        :items="usuaris"
        :search="search"
        sort-by="nom, cognom, correu, rol"
        class="elevation-1"
      >
        <template v-slot:[`item.actiu`]="{ item }">
          <v-checkbox v-model="item.actiu" disabled></v-checkbox>
        </template>

        <template v-slot:top>
          <v-toolbar flat>
            <v-toolbar-title>Administració d'usuaris</v-toolbar-title>
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-spacer></v-spacer>

            <v-dialog v-model="dialog" max-width="500px">
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  color="primary"
                  dark
                  class="mb-2"
                  v-bind="attrs"
                  v-on="on"
                  @click="newItem()"
                >
                  Nou Usuari
                </v-btn>
              </template>

              <v-card>
                <v-card-title>
                  <span class="text-h5">{{ formTitle }}</span>
                </v-card-title>

                <v-card-text>
                  <v-container>
                    <form class="row g-3 needs-validation" novalidate>
                      <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input
                          id="nom"
                          type="text"
                          class="form-control"
                          v-model="usuari.nom"
                          name="nom"
                          required
                        />
                        <div class="invalid-feedback">
                          Sisplau introdueix un nom vàlid.
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="cognoms" class="form-label">Cognom</label>
                        <input
                          id="cognoms"
                          type="text"
                          class="form-control"
                          v-model="usuari.cognoms"
                          name="cognoms"
                          required
                        />
                        <div class="invalid-feedback">
                          Sisplau introdueix un cognom vàlid.
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="correu" class="form-label"
                          >Correu Electrònic</label
                        >
                        <input
                          id="correu"
                          type="email"
                          class="form-control"
                          v-model="usuari.correu"
                          name="correu"
                          required
                        />
                        <div class="invalid-feedback">
                          Sisplau introdueix un correu electrònic vàlid.
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="contrasenya" class="form-label"
                          >Contrasenya</label
                        >
                        <input
                          id="contrasenya"
                          type="text"
                          class="form-control"
                          v-model="usuari.contrasenya"
                          name="contrasenya"
                          required
                        />
                        <div class="invalid-feedback">
                          Sisplau introdueix una contrasenya vàlid.
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="rols_id" class="form-label">Rol</label>
                        <select
                          aria-label="example"
                          class="form-select"
                          v-model="usuari.rols_id"
                          name="rols_id"
                          id="rols_id"
                          required
                        >
                          <option selected>
                            Seleccionar un rol
                          </option>
                          <option
                            v-for="profile in profiles"
                            :key="profile.nom"
                            :value="profile.id"
                          >
                            {{ profile.nom }}
                          </option>
                        </select>
                        <div class="invalid-feedback">
                          Sisplau selecciona un rol.
                        </div>
                      </div>
                      <div class="col-2">
                        <label for="actiu" class="form-label">Actiu</label>
                        <input
                          id="actiu"
                          type="checkbox"
                          class="form-check-input ml-5"
                          :value="usuari.actiu"
                          v-model="usuari.actiu"
                          checked
                          name="actiu"
                        />
                      </div>

                      <v-card-actions>
                        <v-spacer></v-spacer>
                        <button
                          type="button"
                          class="btn btn-outline-primary mr-2"
                          @click="cancel()"
                        >
                          Cancelar
                        </button>
                        <button
                          type="submit"
                          class="btn btn-outline-secondary"
                          @click="insertUsuari()"
                          v-if="insert"
                        >
                          Insertar
                        </button>
                        <button
                          type="submit"
                          class="btn btn-outline-primary"
                          @click="updateUsuari()"
                          v-else
                        >
                          Editar
                        </button>
                      </v-card-actions>
                    </form>
                  </v-container>
                </v-card-text>
              </v-card>
            </v-dialog>
          </v-toolbar>
        </template>

        <template v-slot:[`item.actions`]="{ item }">
          <v-icon small class="ml-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
        </template>
      </v-data-table>
    </v-app>
  </main>
</template>


<script>
export default {
  data: () => ({
    search: "",
    dialog: false,
    headers: [
      { text: "Nom", value: "nom" },
      { text: "Cognoms", value: "cognoms" },
      { text: "Correu", value: "correu" },
      { text: "Actiu", value: "actiu" },
      { text: "Rol", value: "rolsName" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    usuaris: [],
    profiles: [],
    usuari: {
      id: "",
      nom: "",
      cognoms: "",
      contrasenya: "",
      correu: "",
      actiu: "",
      rols_id: "",
    },
    default: {
      id: "",
      nom: "",
      cognoms: "",
      contrasenya: "",
      correu: "",
      actiu: "",
      rols_id: "selected",
    },
    insert: false,
    valueChange: [],
    validateInput: false,
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Nou Usuari" : "Editar Usuari";
    },
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
  },

  created() {
    let me = this;
    me.selectPerfils();
    me.selectUsuaris();
  },

  methods: {
    selectUsuaris() {
      let me = this;
      axios
        .get("/usuaris")
        .then((response) => {
          me.usuaris = response.data;
          console.log("select");
          console.log(response.data);
          this.changeValue();
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
    },
    insertUsuari() {
      let me = this;
      me.checkInputs();
      if (this.validateInput === true) {
        axios
        .post("/usuaris", me.usuari)
        .then((response) => {
          me.selectUsuaris();
          console.log(response.data);
          me.close();
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false));
      } else {
          console.log("not valid")
      }

    },
    updateUsuari() {
      let me = this;
      this.checkInputs();
      if (this.validateInput === true) {
                axios
        .put("/usuaris/" + me.usuari.id, me.usuari)
        .then((response) => {
          console.log(response.data);
          me.selectUsuaris();
          me.close();
        })
        .catch((err) => {
          console.log(err.response.status);
        })
        .finally(() => (this.loading = false));
      } else {
          console.log("input not valid");
      }
    },
    selectPerfils() {
      let me = this;
      axios
        .get("/perfils")
        .then((response) => {
          console.log(response);
          me.profiles = response.data;
        })
        .catch((err) => {
          console.log(err.response.status);
        })
        .finally(() => (this.loading = false));
    },

    changeValue() {
      let me = this;
      for (let i = 0; i < me.usuaris.length; i++) {
        const valUs = me.usuaris[i];
        const findMe = me.profiles.findIndex((object) => {
          return object.id === valUs.rols_id;
        });
        me.usuaris[i] = Object.assign({}, me.usuaris[i], {
          //reactive
          rolsName: me.profiles[findMe].nom,
        });
      }
    },
    checkInputs() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      let forms = document.querySelectorAll(".needs-validation");

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
          "submit",
          function (event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
              this.validateInput = true;
            }

            form.classList.add("was-validated");
          },
          false,
        );
      });
    },
    editItem(item) {
      this.dialog = true;
      this.insert = false;
      this.usuari = item;
    },

    newItem() {
      this.dialog = true;
      this.insert = true;
      this.usuari = this.default;
    },
    cancel() {
        this.selectUsuaris();
        this.close();
    },
    close() {
      this.dialog = false;
    },
  },
};
</script>
