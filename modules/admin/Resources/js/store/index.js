import Vue from "vue";
import Vuex from "vuex";
import User from "./modules/user";
import Category from "./modules/category";
import Product from "./modules/product";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        meta_data: {
            last_page: null,
            current_page: 1,
            prev_page_url: null
        },
        errors: {},
        image: {
            name: "Choose Image ...",
            url: "/img/img-placeholder.png"
        },
        status: ""
    },
    getters: {
        getMetaData: state => state.meta_data,
        getErrorMsg: state => field => {
            if (state.errors.hasOwnProperty(field)) {
                return state.errors[field][0];
            }
        },
        hasError: state => field => {
            return state.errors.hasOwnProperty(field);
        },
        getImage: state => state.image,
        getStatus: state => state.status
    },
    actions: {
        uploadImage({ commit }, e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            let limit = 1024 * 1024 * 2;
            if (file["size"] > limit) {
                return false;
            }
            reader.onloadend = f => {
                let image = {
                    name: file.name,
                    url: reader.result
                };
                commit("setImage", image);
            };
            reader.readAsDataURL(file);
        }
    },
    mutations: {
        setMetaData: (state, data) => {
            state.meta_data.last_page = data.meta.last_page;
            state.meta_data.current_page = data.meta.current_page;
            state.meta_data.prev_page_url = data.links.prev;
        },
        setErrors: (state, data) => {
            state.errors = data;
        },
        setImage: (state, image) => {
            state.image = {
                name: image.name,
                url: image.url
            };
        },
        resetImage: state => {
            state.image = {
                name: "Choose Image ...",
                url: "/img/img-placeholder.png"
            };
        }
    },
    modules: {
        User,
        Category,
        Product
    }
});
