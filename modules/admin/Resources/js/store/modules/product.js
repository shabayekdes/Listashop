import axios from "axios";

const state = {
    products: []
};

const getters = {
    getAllProducts: state => state.products
};

const actions = {
    async fetchListProducts({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}product${query}`);

        commit("showListProducts", response.data);
        commit("setMetaData", response.data, { root: true });
    }
};

const mutations = {
    showListProducts: (state, data) => {
        state.products = data.data;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
