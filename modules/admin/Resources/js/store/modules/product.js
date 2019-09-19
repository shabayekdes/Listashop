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
        category_id: ""
    },
    status: "none"
};

const getters = {
    getAllProducts: state => state.products,
    getNewProduct: state => state.product,
    getStatus: state => state.status
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
            commit("resetNewProduct");
            commit("resetImage");
        } catch (e) {
            commit("setErrors", e.response.data.errors);
        }
    },
    setCategory({ commit }, oldProduct) {
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
        state.status = "ok";
    },
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
