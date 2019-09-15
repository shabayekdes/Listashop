import axios from "axios";

const state = {
    categories: []
};

const getters = {
    getAllCategories: state => state.categories
};

const actions = {
    async fetchListCategories({ commit }, paged = null) {
        let response = "";
        if (paged == "all") {
            response = await axios.get(`${urlApi}category?show=all`);
        } else {
            let query = paged !== null ? `?page=${paged}` : "";
            response = await axios.get(`${urlApi}category${query}`);
            commit("setMetaData", response.data, { root: true });
        }

        commit("showListCategories", response.data);
    }
};

const mutations = {
    showListCategories: (state, data) => {
        state.categories = data.data;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
