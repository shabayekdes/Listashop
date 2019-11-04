import Vue from "vue";
import Vuex from "vuex";
import User from "./modules/user";
import Category from "./modules/category";
import Product from "./modules/product";
import Image from "./modules/image";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        meta_data: {
            last_page: null,
            current_page: 1,
            prev_page_url: null
        },
        errors: {},
        status: "",
        editMode: false
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
        getStatus: state => state.status,
        getMode: state => state.editMode
    },
    actions: {
        setError({ commit }, oldError) {
            commit("SET_ERRORS", oldError);
        },
        setMode({ state }, bool) {
            state.editMode = bool;
        }
    },
    mutations: {
        SET_META_DATA: (state, data) => {
            state.meta_data.last_page = data.meta.last_page;
            state.meta_data.current_page = data.meta.current_page;
            state.meta_data.prev_page_url = data.links.prev;
        },
        SET_ERRORS: (state, data) => {
            state.errors = data;
        }
    },
    modules: {
        User,
        Category,
        Product,
        Image
    }
});
