import axios from "axios";

const state = {
    categories: []
};

const getters = {
    getAllCategories: state => state.categories
};

const actions = {
    async fetchListCategories({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}category${query}`);

        commit("showListCategories", response.data);
        commit("setMetaData", response.data, { root: true });
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
