import Vue from "vue";
import Vuex from "vuex";
import User from "./modules/user";
import Category from "./modules/category";
import Product from "./modules/product";
import Order from "./modules/order";
import Image from "./modules/image";
// import Attribute from "./modules/attribute";
import Option from "./modules/option";

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
        loading: true,
        editMode: false
    },
    getters: {
        getMetaData: state => state.meta_data,
        getLoading: state => state.loading,
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
        },
        SET_LOADING: state => {
            state.loading = !state.loading;
        },
        SET_STATUS: (state, data) => {
            state.status = data;
        }
    },
    modules: {
        User,
        Category,
        Product,
        Order,
        // Attribute,
        Option,
        Image
    }
});
