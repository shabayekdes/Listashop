import axios from "axios";

const state = {
    customers: []
};

const getters = {
    getAllCustomers: state => state.customers
};

const actions = {
    async fetchListCustomers({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}customer${query}`);

        commit("SHOW_LIST_CUSTOMERS", response.data);
        commit("SET_META_DATA", response.data, { root: true });
    }
};

const mutations = {
    SHOW_LIST_CUSTOMERS: (state, data) => {
        state.customers = data.data;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
