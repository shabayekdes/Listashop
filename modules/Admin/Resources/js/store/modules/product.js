import axios from "axios";
import router from "@Admin/router";

const state = {
    products: [],
    product: {
        type: "configurable"
    }
};
const getters = {
    getAllProducts: state => state.products,
    getSingleProduct: state => state.product
};

const actions = {
    async fetchListProducts({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}product${query}`);

        commit("SHOW_LIST_PRODUCTS", response.data);
        commit("SET_META_DATA", response.data, { root: true });
        commit("SET_LOADING", { root: true });
    },
    async storeProduct({ commit, dispatch }, data) {
        try {
            const config = {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            };
            const response = await axios.post(`${urlApi}product`, data, config);

            commit("NEW_PRODUCT", response.data);
            dispatch("resetProduct");
            commit("SET_LOADING", { root: true });
            router.push("/admin/products");
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async showProduct({ commit, dispatch }, id) {
        const response = await axios.get(`${urlApi}product/${id}`);

        let thumb = response.data.data.thumbnail;

        if (thumb !== null) {
            let thumbObj = {};
            thumbObj.url = thumb;
            thumbObj.name = thumb.split(id + "/").pop();
            dispatch("setImage", thumbObj, { root: true });
        }

        commit("SET_PRODUCT", response.data.data);

        response.data.data.options.map(option =>
            dispatch("addSelectedOptions", option, { root: true })
        );
    },
    async updateProduct({ commit, dispatch }, data) {
        try {
            const config = {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            };
            const response = await axios.post(
                `${urlApi}product/${data.get("id")}`,
                data,
                config
            );

            commit("PUT_PRODUCT", response.data);
            dispatch("resetProduct");

            router.push("/admin/products");
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
    },
    resetProduct({ commit, dispatch }) {
        commit("RESET_NEW_PRODUCT");
        dispatch("resetImages", { root: true });
        dispatch("resetOption", { root: true });
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
    RESET_NEW_PRODUCT: state => {
        state.product = {
            type: "configurable"
        };
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
