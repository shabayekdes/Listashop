import Vue from "vue";
import Vuex from "vuex";
import User from "./modules/user";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        meta_data: {
            last_page: null,
            current_page: 1,
            prev_page_url: null
        }
    },
    getters: {
        getMetaData: state => state.meta_data
    },
    mutations: {
        setMetaData: (state, data) => {
            state.meta_data.last_page = data.meta.last_page;
            state.meta_data.current_page = data.meta.current_page;
            state.meta_data.prev_page_url = data.links.prev;
        }
    },
    modules: {
        User
    }
});
