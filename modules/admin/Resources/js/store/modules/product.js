import axios from "axios";

const state = {
    products: [],
    product: {
        id: "",
        name: "",
        sku: "",
        slug: "",
        price: "",
        cost: "",
        category_id: ""
    }
};

const getters = {
    getAllProducts: state => state.products,
    getNewProduct: state => state.product
};

const actions = {
    async fetchListProducts({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}product${query}`);

        commit("showListProducts", response.data);
        commit("setMetaData", response.data, { root: true });
    },
    async storeProduct({ commit }, data) {
        try {
            const response = await axios.post(`${urlApi}product`, data);

            commit("newProduct", response.data);
            commit("setErrors", {});
        } catch (e) {
            commit("setErrors", e.response.data.errors);
        }
    }
};

const mutations = {
    showListProducts: (state, data) => {
        state.products = data.data;
    },
    newProduct: (state, data) => {
        state.products.unshift(data);
        Object.keys(state.product).forEach(key => {
            state.product[key] = "";
        });
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
