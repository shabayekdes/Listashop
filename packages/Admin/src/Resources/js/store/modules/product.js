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
        type: "simple",
        category_id: ""
    },
    variations: []
};

const getters = {
    getAllProducts: state => state.products,
    getSingleProduct: state => state.product,
    getVariations: state => state.variations
};

const actions = {
    async fetchListProducts({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}product${query}`);

        commit("SHOW_LIST_PRODUCTS", response.data);
        commit("SET_META_DATA", response.data, { root: true });
        commit("SET_LOADING", { root: true });
    },
    async storeProduct({ commit, rootState }, data) {
        try {
            const config = {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            };
            const response = await axios.post(`${urlApi}product`, data, config);

            commit("NEW_PRODUCT", response.data);
            commit("RESET_NEW_PRODUCT");
            commit("RESET_SELECTED_ATTR");
            commit("SET_LOADING", { root: true });

            rootState.status = "ok";
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async updateProduct({ commit, rootState }, data) {
        try {
            const response = await axios.put(
                `${urlApi}product/${data.id}`,
                data
            );

            commit("PUT_PRODUCT", response.data);
            commit("RESET_NEW_PRODUCT");
            commit("RESET_IMAGE");
            rootState.status = "ok";
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async deleteProduct({ commit }, id) {
        await axios.delete(`${urlApi}product/${id}`);
        commit("REMOVE_PRODUCT", id);
    },
    setProduct({ commit }, oldProduct) {
        commit("SET_PRODUCT", oldProduct);
        if (oldProduct.thumbnail != null) {
            commit(
                "SET_IMAGE",
                {
                    name: oldProduct.thumbnail,
                    url: "/img/category/" + oldProduct.thumbnail
                },
                { root: true }
            );
        }
    }
};

const mutations = {
    SHOW_LIST_PRODUCTS: (state, data) => {
        state.products = data.data;
    },
    NEW_PRODUCT: (state, data) => {
        state.products.unshift(data);
    },
    PUT_PRODUCT: (state, data) => {
        const index = state.products.findIndex(
            product => product.id === data.id
        );
        if (index !== -1) {
            state.products.splice(index, 1, data);
        }
    },
    REMOVE_PRODUCT: (state, id) =>
        (state.products = state.products.filter(product => product.id !== id)),
    SET_PRODUCT: (state, oldProduct) => {
        state.product = oldProduct;
    },
    SET_VARIATION: (state, newVariation) => {
        state.variations = [];
        state.variations.push(...newVariation);
    },
    REMOVE_VARIATION: state => {
        state.variations = [];
    },
    RESET_NEW_PRODUCT: state => {
        state.product = {
            id: "",
            name: "",
            sku: "",
            slug: "",
            price: "",
            cost: "",
            type: "simple",
            category_id: ""
        };
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
