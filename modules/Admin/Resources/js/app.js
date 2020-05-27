require("./bootstrap");

import Vue from "vue";
import store from "./store";
import router from "./router";

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

const app = new Vue({
    el: "#app",
    router,
    store
});
