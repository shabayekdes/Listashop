import axios from "axios";

const state = {
    customers: [],
    customer: {
        address : {}
    }
};

const getters = {
    getAllCustomers: state => state.customers,
    getSingleCustomer: state => state.customer,
    getSingleCustomerAddress: state => state.customer.address
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
        state.customer.address = customer.address;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
