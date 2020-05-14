import axios from "axios";
import router from "@Admin/router";

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
    async updateOrder({ commit }, data) {
        try {
            const response = await axios.put(
                `${urlApi}order/${data.id}`,
                data
            );

            commit("PUT_ORDER", response.data);

            router.push("/admin/orders");
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    setOrder({ state }, oldOrder) {
        state.order = oldOrder;
    }
};

const mutations = {
    SHOW_LIST_ORDERS: (state, data) => {
        state.orders = data.data;
    },
    PUT_ORDER: (state, data) => {
        const index = state.orders.findIndex(
            order => order.id === data.id
        );
        if (index !== -1) {
            state.orders.splice(index, 1, data);
        }
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
