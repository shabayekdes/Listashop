require("./bootstrap");

import Vue from "vue";
import store from "./store";
import router from "./router";
import swal from 'sweetalert2';

Vue.component("not-found", require("@Admin/views/NotFound.vue"));

Vue.filter("slug", function(value) {
    if (!value) return "";

    value = value.toString();

    return value
        .toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
});


window.swal = swal;
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

Vue.mixin({
    methods: {
        truncate: (str, no_word) => str.substr(0, no_word) + "...",
        slugify(value){
            if (!value) return "";

            value = value.toString();
        
            return value
                .toLowerCase()
                .replace(/[^\w ]+/g, "")
                .replace(/ +/g, "-");
        } 
    }
});

const app = new Vue({
    el: "#app",
    router,
    store
});
