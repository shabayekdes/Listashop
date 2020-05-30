import axios from "axios";

const state = {
    customers: [],
    customer: {}
};

const getters = {
    getAllCustomers: state => state.customers,
    getSingleCustomer: state => state.customer

};

const actions = {
    async fetchListCustomers({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}customer${query}`);

        commit("SHOW_LIST_CUSTOMERS", response.data);
        commit("SET_META_DATA", response.data, { root: true });
    },
    async showCustomer({ commit }, id) {
        const response = await axios.get(`${urlApi}customer/${id}`);

        commit("SET_CUSTOMER", response.data.data);
    },
};

const mutations = {
    SHOW_LIST_CUSTOMERS: (state, data) => {
        state.customers = data.data;
    },
    SET_CUSTOMER: (state, customer) => {
        state.customer = customer;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
