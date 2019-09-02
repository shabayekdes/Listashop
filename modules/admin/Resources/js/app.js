require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";
import { routes } from "./routes";

Vue.use(VueRouter);


Vue.component("not-found", require("./views/NotFound.vue"));
Vue.component("loading", require("./views/Loading.vue"));


const router = new VueRouter({
    routes,
    mode: "history"
});

const app = new Vue({
    el: "#app",
    router,
    store
});
