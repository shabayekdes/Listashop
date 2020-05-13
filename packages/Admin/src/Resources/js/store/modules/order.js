import axios from "axios";

const state = {
    orders: [],
    order: {}
};

const getters = {
    getAllOrders: state => state.orders,
    getSingleOrder: state => state.order
};

const actions = {
    async fetchListOrders({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}order${query}`);

        commit("SHOW_LIST_ORDERS", response.data);
        commit("SET_META_DATA", response.data, { root: true });
    },
    async showOrder({ commit }, id) {
        const response = await axios.get(`${urlApi}order/${id}`);

        commit("SET_ORDER", response.data.data);
    },
    setOrder({ state }, oldOrder) {
        state.order = oldOrder;
    }
};

const mutations = {
    SHOW_LIST_ORDERS: (state, data) => {
        state.orders = data.data;
    },
    SET_ORDER: (state, order) => {
        state.order = order;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
