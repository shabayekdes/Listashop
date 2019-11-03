require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";
import { routes } from "./routes";

Vue.use(VueRouter);

Vue.component("not-found", require("@Admin/views/NotFound.vue"));
Vue.component("loading", require("@Admin/views/Loading.vue"));

Vue.filter("slug", function(value) {
    if (!value) return "";

    value = value.toString();

    return value
        .toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
});

const router = new VueRouter({
    routes,
    mode: "history"
});

const app = new Vue({
    el: "#app",
    router,
    store
});
