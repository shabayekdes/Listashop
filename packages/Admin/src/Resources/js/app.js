require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";
import { routes } from "./routes";

Vue.use(VueRouter);

Vue.component("not-found", require("@Admin/views/NotFound.vue"));

Vue.filter("slug", function(value) {
    if (!value) return "";

    value = value.toString();

    return value
        .toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
});

Vue.mixin({
    methods: {
        truncate: (str, no_word) => str.substr(0, no_word) + "..."
    }
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
