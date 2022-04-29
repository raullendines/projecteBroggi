/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import moment from "moment";
import Vue from "vue";
import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css'; // vuetify style css

require("./bootstrap");
require("moment");

window.Vue = require("vue").default;

Vue.use(Vuetify);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "navbar-component",
    require("./components/NavbarComponent.vue").default
);
Vue.component(
    "form-component",
    require("./components/FormComponent.vue").default
);
Vue.component(
    "callcard-component",
    require("./components/CallCardComponent.vue").default
);
Vue.component(
    "callmanagement-component",
    require("./components/CallManagementComponent.vue").default
);
Vue.component(
    "map-component",
    require("./components/MapComponent.vue").default
);
Vue.component(
    "admin-component",
    require("./components/AdminComponent.vue").default
);
Vue.component(
    "graph-component",
    require("./components/GraphComponent.vue").default
);
Vue.component(
    "pie-component",
    require("./components/GraphPieComponent.vue").default
);
Vue.component(
    "linear-component",
    require("./components/GraphLinearComponent.vue").default
);
Vue.component(
    "landingpage-component",
    require("./components/LandingPageComponent.vue").default
);
Vue.component(
    "error-component",
    require("./components/ErrorComponent.vue").default
);
Vue.component(
    "managementForm-component",
    require("./components/ManagementFormComponent.vue").default
);
Vue.component(
    "video-component",
    require("./components/VideoComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    vuetify: new Vuetify(), // to access $vuetify inside your Vue components
    moment: new moment,
});
