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
        thumbnail: "",
        categories_id: ""
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
    async storeProduct({ commit, rootState }, data) {
        try {
            const response = await axios.post(`${urlApi}product`, data);

            commit("newProduct", response.data);
            commit("resetNewProduct");
            commit("resetImage");
            rootState.status = "ok";
        } catch (e) {
            commit("setErrors", e.response.data.errors);
        }
    },
    async updateProduct({ commit, rootState }, data) {
        try {
            const response = await axios.put(
                `${urlApi}product/${data.id}`,
                data
            );

            commit("putProduct", response.data);
            commit("resetNewProduct");
            commit("resetImage");
            rootState.status = "ok";
        } catch (e) {
            commit("setErrors", e.response.data.errors);
        }
    },
    async deleteProduct({ commit }, id) {
        await axios.delete(`${urlApi}product/${id}`);
        commit("removeProduct", id);
    },
    setProduct({ commit }, oldProduct) {
        commit("setProduct", oldProduct);
        if (oldProduct.thumbnail != null) {
            commit(
                "setImage",
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
    showListProducts: (state, data) => {
        state.products = data.data;
    },
    newProduct: (state, data) => {
        state.products.unshift(data);
    },
    putProduct: (state, data) => {
        const index = state.products.findIndex(
            product => product.id === data.id
        );
        if (index !== -1) {
            state.products.splice(index, 1, data);
        }
    },
    removeProduct: (state, id) =>
        (state.products = state.products.filter(product => product.id !== id)),
    setProduct: (state, oldProduct) => {
        state.product = oldProduct;
    },
    resetNewProduct: state => {
        state.product = {
            name: "",
            sku: "",
            slug: "",
            price: "",
            cost: "",
            thumbnail: "",
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
